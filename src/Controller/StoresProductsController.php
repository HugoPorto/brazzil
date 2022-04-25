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

        $loginMenu = $this->loginMenuLoad();

        $storesProducts = $this->StoresProducts->find(
            'all',
            [
                'contain' => 'StoresCategories'
            ]
        );

        $this->set(compact(
            [
                'storesProducts',
                'loginMenu'
            ]
        ));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $storesProduct = $this->StoresProducts->get($id, [
            'contain' => ['Users', 'StoresCategories']
        ]);

        $this->set('storesProduct', $storesProduct);
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

        $storesProduct = $this->StoresProducts->newEntity();

        if ($this->request->is('post')) {
            $photo = $this->processPhoto($this->request->data);

            $qrCode = $this->getQrCode($this->request->getData());

            $data = $this->request->getData();

            $data['photo'] = $photo;

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
                $this->Flash->success(__('The stores product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The stores product could not be saved. Please, try again.'));
        }

        $users = $this->StoresProducts->Users->find('list', ['limit' => 200]);

        $storesCategories = $this->StoresProducts->StoresCategories->find('list', ['limit' => 200]);

        $this->set(compact('storesProduct', 'users', 'storesCategories'));
    }

    private function processPhoto($request)
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

        $storesProduct = $this->StoresProducts->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['price'] = str_replace(",", ".", $this->request->getData()['price']);

            $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);

            if ($this->StoresProducts->save($storesProduct)) {
                $this->Flash->success(__('The stores product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The stores product could not be saved. Please, try again.'));
        }

        $users = $this->StoresProducts->Users->find('list');

        $storesCategories = $this->StoresProducts->StoresCategories->find('list');

        $this->set(compact('storesProduct', 'users', 'storesCategories'));
    }

    public function editQrcode($id = null)
    {
        $this->hasPermission('storeAdmin');
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

        $this->set(compact('storesProduct', 'users', 'storesCategories'));

        $storesProduct->qrcode = '';
    }

    public function editBarcode($id = null)
    {
        $this->hasPermission('storeAdmin');

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

        $this->set(compact('storesProduct', 'users', 'storesCategories'));
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

    public function editPhoto($id = null)
    {
        $this->hasPermission('storeAdmin');

        $storesProduct = $this->StoresProducts->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->processPhoto($this->request->data);

            $data = $this->request->getData();

            $data['photo'] = $photo;

            $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);

            if ($this->StoresProducts->save($storesProduct)) {
                $this->Flash->success(__('The stores product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The stores product could not be saved. Please, try again.'));
        }

        $storesProduct->photo = '';

        $this->set(compact('storesProduct'));
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
}
