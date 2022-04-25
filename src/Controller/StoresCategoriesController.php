<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresCategoriesController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesCategories = $this->paginate($this->StoresCategories);

        $this->set(compact('storesCategories', 'loginMenu'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesCategory = $this->StoresCategories->get($id);

        $this->set(compact('storesCategory', 'loginMenu'));
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesCategory = $this->StoresCategories->newEntity();

        if ($this->request->is('post')) {
            $storesCategory = $this->StoresCategories->patchEntity($storesCategory, $this->request->getData());

            if ($this->StoresCategories->save($storesCategory)) {
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('A categoria não pode ser ssalva. Por favor, tente novamente.'));
        }

        $this->set(compact('storesCategory', 'loginMenu'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesCategory = $this->StoresCategories->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesCategory = $this->StoresCategories->patchEntity($storesCategory, $this->request->getData());

            if ($this->StoresCategories->save($storesCategory)) {
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('A categoria não pode ser editada. Por favor, tente novamente.'));
        }

        $this->set(compact('storesCategory', 'loginMenu'));
    }

    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->loadModel('StoresProducts');

        $products = $this->StoresProducts->find(
            'all',
            [
                'conditions' => [
                    'StoresProducts.stores_categories_id =' => $id
                ]
            ]
        );

        if (!empty($products->toArray())) {
            echo 'A categoria não pode ser apagada porq que existem produtos que a utilizam.';
            exit();
        } else {
            $storesCategory = $this->StoresCategories->get($id);

            if ($this->StoresCategories->delete($storesCategory)) {
                echo 'success';
                exit();
            }
        }
    }
}
