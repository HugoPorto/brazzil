<?php

namespace App\Controller;

use App\Controller\AppController;
use CodeItNow\BarcodeBundle\Utils\QrCode;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

class StoresProductsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Base64');
    }

    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesProducts = $this->StoresProducts->find('all', ['contain' => ['StoresCategories', 'StoresColors']]);


        if (empty($storesProducts->toArray())) {
            $storesProducts = $this->StoresProducts->find('all', ['contain' => ['StoresCategories']]);
            foreach ($storesProducts as $key => $value) {
                $storesProduct = $this->StoresProducts->get($value->id, [
                    'contain' => []
                ]);

                $data = [];
                $data['random_code'] = uniqid('product_', true);
                $idColor = $this->saveColor($value->id, null, $data['random_code'], 'FFF');
                $data['stores_colors_id'] = $idColor;
                $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);

                $this->StoresProducts->save($storesProduct);
            }
        }

        $storesProducts = $this->StoresProducts->find('all', ['contain' => ['StoresCategories', 'StoresColors']]);

        $this->set(compact(
            [
                'storesProducts'
            ]
        ));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $this->loadModel('StoresImagesProducts');

        $imagesExtrasProduct = $this->StoresImagesProducts->find('all', [
            'conditions' => [
                'StoresImagesProducts.stores_products_id =' => $id
            ]
        ]);

        $storesProduct = $this->StoresProducts->get($id, [
            'contain' => ['Users', 'StoresCategories', 'StoresColors']
        ]);

        $this->set(compact('storesProduct', 'imagesExtrasProduct'));
    }

    private function getQrCode($data)
    {
        $qrCode = new QrCode();

        $qrCode
            ->setText($data['qrcode'])
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Scan Qr Code')
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG)
        ;

        return $qrCode;
    }

    private function getBarCode($data)
    {
        $barcode = new BarcodeGenerator();

        $barcode->setText($data['barcode']);

        $barcode->setType(BarcodeGenerator::Code128);

        $barcode->setScale(2);

        $barcode->setThickness(25);

        $barcode->setFontSize(10);

        $code = $barcode->generate();

        return $code;
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesProduct = $this->StoresProducts->newEntity();

        if ($this->request->is('post')) {
            $idColor = $this->saveColor();

            $photo = $this->processMainPhoto($this->request->getData());

            $qrCode = $this->getQrCode($this->request->getData());

            $data = $this->request->getData();

            $data['photo'] = $photo;

            $data['stores_colors_id'] = $idColor;

            $data['random_code'] = uniqid('product_', true);

            if (!empty($data['qrcode'])) {
                $data['qrcode'] = '<img style="width: 200px" src="data:' . $qrCode->getContentType() . ';base64,' . $qrCode->generate() . '" />';
            }

            $code = $this->getBarCode($this->request->getData());

            if (!empty($data['barcode'])) {
                $data['barcode'] = '<img src="data:image/png;base64,' . $code . '" />';

                $data['barcode_code'] = $this->request->getData()['barcode'];
            }

            $data['active'] = 1;

            $data['price'] = str_replace(",", ".", $this->request->getData()['price']);

            $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);

            if ($this->StoresProducts->save($storesProduct)) {
                $this->saveImagesExtras($this->request->getData(), $storesProduct);

                $this->saveColor($storesProduct->id, $idColor, $data['random_code']);

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The stores product could not be saved. Please, try again.'));
        }

        $storesCategories = $this->StoresProducts->StoresCategories->find('list', ['limit' => 1000]);

        $this->set(compact('storesProduct', 'storesCategories'));
    }

    private function processMainPhoto($request)
    {
        $this->hasPermission('storeAdmin');

        if ($request['photo'][0]['tmp_name'] !== '') {
            return $this->Base64->convert($request['photo']);
        } else {
            $this->Flash->error(__('Você precisa selecionar uma imagem.'));
        }
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesProduct = $this->StoresProducts->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['price'] = str_replace(",", ".", $this->request->getData()['price']);

            $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);

            if ($this->StoresProducts->save($storesProduct)) {
                $this->updateColor($storesProduct->stores_colors_id, $this->request->getData()['color']);

                return $this->redirect(['action' => 'index']);
            }
        }

        $storesCategories = $this->StoresProducts->StoresCategories->find('list');

        $this->set(compact('storesProduct', 'storesCategories', 'loginMenu'));
    }

    public function editQrcode($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesProduct = $this->StoresProducts->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $qrCode = new QrCode();

            $qrCode
                ->setText($this->request->getData()['qrcode'])
                ->setSize(300)
                ->setPadding(10)
                ->setErrorCorrection('high')
                ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
                ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
                ->setLabel('Scan Qr Code')
                ->setLabelFontSize(16)
                ->setImageType(QrCode::IMAGE_TYPE_PNG)
            ;

            $data = $this->request->getData();

            $data['qrcode'] = '<img style="width: 200px" src="data:' . $qrCode->getContentType() . ';base64,' . $qrCode->generate() . '" />';

            $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);

            if ($this->StoresProducts->save($storesProduct)) {
                $this->Flash->success(__('The stores product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The stores product could not be saved. Please, try again.'));
        }

        $users = $this->StoresProducts->Users->find('list');

        $storesCategories = $this->StoresProducts->StoresCategories->find('list');

        $this->set(compact('storesProduct', 'users', 'storesCategories', 'loginMenu'));

        $storesProduct->qrcode = '';
    }

    public function editBarcode($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesProduct = $this->StoresProducts->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            $barcode = new BarcodeGenerator();

            $barcode->setText($this->request->getData()['barcode']);

            $barcode->setType(BarcodeGenerator::Code128);

            $barcode->setScale(2);

            $barcode->setThickness(25);

            $barcode->setFontSize(10);

            $code = $barcode->generate();

            $data['barcode'] = '<img src="data:image/png;base64,' . $code . '" />';

            $data['barcode_code'] = $this->request->getData()['barcode'];

            $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);

            if ($this->StoresProducts->save($storesProduct)) {
                $this->Flash->success(__('The stores product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The stores product could not be saved. Please, try again.'));
        }

        $users = $this->StoresProducts->Users->find('list');

        $storesCategories = $this->StoresProducts->StoresCategories->find('list');

        $storesProduct->barcode = '';

        $this->set(compact('storesProduct', 'users', 'storesCategories', 'loginMenu'));
    }

    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->request->allowMethod(['post', 'delete']);

        $storesProduct = $this->StoresProducts->get($id);

        if ($this->StoresProducts->delete($storesProduct)) {
            $this->Flash->success(__('The stores product has been deleted.'));
        } else {
            $this->Flash->error(__('The stores product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function verifyImagesProducts($storesProduct)
    {
        $this->loadModel('StoresImagesProducts');

        $storesImagesProducts = $this->StoresImagesProducts->find('all', [
            'conditions' => [
                'StoresImagesProducts.stores_products_id =' => $storesProduct->id
            ]
        ]);

        if (empty($storesImagesProducts->toArray())) {
            return true;
        } else {
            return false;
        }
    }

    public function editPhoto($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesProduct = $this->StoresProducts->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->processMainPhoto($this->request->getData());

            $data = $this->request->getData();

            $data['photo'] = $photo;

            $data['random_code'] = uniqid('product_', true);

            if ($this->verifyImagesProducts($storesProduct)) {
                $this->saveImagesExtras($this->request->getData(), $storesProduct);
            } else {
                $this->editImagesExtras($this->request->getData(), $storesProduct);
            }

            $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);

            if ($this->StoresProducts->save($storesProduct)) {
                $this->updateRandomCodeColorAndId(
                    $storesProduct->stores_colors_id,
                    $data['random_code'],
                    $storesProduct->id
                );

                return $this->redirect(['action' => 'index']);
            }
        }

        $storesProduct->photo = '';

        $this->set(compact('storesProduct', 'loginMenu'));
    }

    public function inactiveProduct($id = null)
    {
        $this->hasPermission('storeAdmin');
        $storesProduct = $this->StoresProducts->get($id);

        $storesProduct->active = false;

        $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $storesProduct->toArray());

        if ($this->StoresProducts->save($storesProduct)) {
            $this->Flash->success(__('The stores product has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
    }

    public function relationshipProducts($idCategory = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesProducts = $this->StoresProducts->find('all', [
            'conditions' =>
                [
                    'StoresProducts.stores_categories_id =' => $idCategory
                ]
        ]);

        $this->set(compact('storesProducts', 'loginMenu'));
    }

    private function saveColor($idProduct = null, $idColor = null, $product_flag_code = null, $color = null)
    {
        $this->loadModel('StoresColors');

        if ($idColor) {
            $storesColor = $this->StoresColors->get($idColor, [
                'contain' => []
            ]);
        } else {
            $storesColor = $this->StoresColors->newEntity();
        }

        $data = [];

        if ($color) {
            $data['color'] = $color;
        } else {
            $data['color'] = $this->request->getData('color');
        }


        if ($product_flag_code) {
            $data['product_flag_code'] = $product_flag_code;
        }

        if ($idProduct) {
            $data['stores_products_id'] = $idProduct;
        }

        $storesColor = $this->StoresColors->patchEntity($storesColor, $data);

        $this->StoresColors->save($storesColor);

        return $storesColor->id;
    }

    private function saveImagesExtras($request, $storesProduct)
    {
        $this->loadModel('StoresImagesProducts');

        for ($i = 1; $i <= 4; $i++) {
            $count = $i + 1;
            $photo = $this->Base64->convert($request['photo' . $count]);

            $storesImagesProduct = $this->StoresImagesProducts->newEntity();

            $data = [];
            $data['photo'] = $photo;
            $data['stores_products_id'] = $storesProduct->id;

            $storesImagesProduct = $this->StoresImagesProducts->patchEntity($storesImagesProduct, $data);

            $this->StoresImagesProducts->save($storesImagesProduct);
        }
    }

    private function editImagesExtras($request, $storesProduct)
    {
        $this->loadModel('StoresImagesProducts');

        $storesImagesProducts = $this->StoresImagesProducts->find('all', [
            'conditions' => [
                'StoresImagesProducts.stores_products_id =' => $storesProduct->id
            ]
        ]);

        foreach ($storesImagesProducts as $key => $value) {
            $storesImagesProduct = $this->StoresImagesProducts->get($value->id, [
                'contain' => []
            ]);

            $data = $storesImagesProduct;

            $data['photo'] = $this->Base64->convert($request['photo' . ($key + 2)]);

            $storesImagesProduct = $this->StoresImagesProducts->patchEntity($storesImagesProduct, $data->toArray());

            $this->StoresImagesProducts->save($storesImagesProduct);
        }
    }

    public function addNewProductColor($id)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');



        $storesProduct = $this->StoresProducts->get($id, [
            'contain' => []
        ]);

        $data = [];

        foreach ($storesProduct->toArray() as $key => $value) {
            if ($key !== 'id' && $key !== 'modified' && $key !== 'created' && $key !== 'photo') {
                $data[$key] = $value;
            }
        }

        $storesProductNew = $this->StoresProducts->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $idColor = $this->saveColor();

            $photo = $this->processMainPhoto($this->request->getData());

            $data['product'] = $this->request->getData()['product'];

            $data['description'] = $this->request->getData()['description'];

            $data['photo'] = $photo;

            $data['stores_colors_id'] = $idColor;

            $storesProductNew = $this->StoresProducts->patchEntity($storesProductNew, $data);

            if ($this->StoresProducts->save($storesProductNew)) {
                $this->saveImagesExtras($this->request->getData(), $storesProductNew);
                $this->saveColor($storesProductNew->id, $idColor, $data['random_code']);

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The stores product could not be saved. Please, try again.'));
        }

        $storesCategories = $this->StoresProducts->StoresCategories->find('list');

        $this->set(compact('storesProduct', 'storesCategories'));
    }

    private function updateRandomCodeColorAndId($idColor = null, $product_flag_code = null, $idProduct = null)
    {
        $this->loadModel('StoresColors');

        $storesColor = $this->StoresColors->get($idColor, [
            'contain' => []
        ]);

        $data = [];

        $data['product_flag_code'] = $product_flag_code;

        $data['stores_products_id'] = $idProduct;

        $storesColor = $this->StoresColors->patchEntity($storesColor, $data);

        $this->StoresColors->save($storesColor);

        return $storesColor->id;
    }

    private function updateColor($idColor = null, $color = null)
    {
        $this->loadModel('StoresColors');

        $storesColor = $this->StoresColors->get($idColor, [
            'contain' => []
        ]);

        $data = [];

        $data['color'] = $color;

        $storesColor = $this->StoresColors->patchEntity($storesColor, $data);

        $this->StoresColors->save($storesColor);

        return $storesColor->id;
    }
}
