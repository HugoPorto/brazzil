<?php

namespace App\Controller;

use App\Controller\AppController;

class LowsProductsController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $lowsProducts = $this->LowsProducts->find('all', ['contain' => ['StoresProducts', 'Users']]);

        $this->set(compact('lowsProducts', 'loginMenu'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $lowsProduct = $this->LowsProducts->get($id, [
            'contain' => ['StoresProducts', 'Users']
        ]);

        $this->set(compact('lowsProduct', 'loginMenu'));
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $lowsProduct = $this->LowsProducts->newEntity();

        if ($this->request->is('post')) {
            $lowsProduct = $this->LowsProducts->patchEntity($lowsProduct, $this->request->getData());

            $this->loadModel('StoresProducts');

            $storesProduct = $this->StoresProducts->get($this->request->getData()['stores_products_id'], [
                'contain' => []
            ]);

            if ($this->request->getData()['quantity'] <= 0) {
                $this->Flash->error(__('Você não pode passar zero como valor da baixa.'));

                return $this->redirect($this->referer());
            }

            if ($storesProduct->quantity > 0) {
                if ($storesProduct->quantity >= $this->request->getData()['quantity']) {
                    $storeProductSet = [
                        'product' => $storesProduct->product,
                        'description' => $storesProduct->description,
                        'price' => $storesProduct->price,
                        'stores_categories_id' => $storesProduct->stores_categories_id,
                        'photo' => $storesProduct->photo,
                        'quantity' => $storesProduct->quantity - $this->request->getData()['quantity'],
                        'active' => $storesProduct->quantity - $this->request->getData()['quantity'] === 0 ? 0 : $storesProduct->active,
                        'online' => $storesProduct->online
                    ];

                    $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $storeProductSet);

                    $this->StoresProducts->save($storesProduct);
                } else {
                    $this->Flash->error(__('Seu estoque desse produto é inferior a quantidade que você digitou para dar baixa.'));

                    return $this->redirect($this->referer());
                }
            } else {
                $storeProductSet = [
                    'product' => $storesProduct->product,
                    'description' => $storesProduct->description,
                    'price' => $storesProduct->price,
                    'stores_categories_id' => $storesProduct->stores_categories_id,
                    'photo' => $storesProduct->photo,
                    'quantity' => 0,
                    'active' => $storesProduct->active,
                    'online' => $storesProduct->online
                ];

                $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $storeProductSet);

                $this->StoresProducts->save($storesProduct);

                $this->Flash->error(__('Seu estoque de produtos está zerado.'));

                return $this->redirect($this->referer());
            }



            if ($this->LowsProducts->save($lowsProduct)) {
                $this->Flash->success(__('The lows product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The lows product could not be saved. Please, try again.'));
        }

        $storesProducts = $this->LowsProducts->StoresProducts->find('list');

        $users = $this->LowsProducts->Users->find('list');

        $this->set(compact('lowsProduct', 'storesProducts', 'users', 'loginMenu'));
    }
}
