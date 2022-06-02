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

        $this->loadModel('StoresSubcategories');

        $products = $this->StoresProducts->find(
            'all',
            [
                'conditions' => [
                    'StoresProducts.stores_categories_id =' => $id
                ]
            ]
        );

        $storesSubcategories = $this->StoresSubcategories->find(
            'all',
            [
                'conditions' => [
                    'StoresSubcategories.stores_categories_id =' => $id
                ]
            ]
        );

        if (!empty($products->toArray())) {
            return $this->response->withStatus(200)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'A categoria não pode ser apagada porque que existem produtos que a utilizam.']));
        } elseif (!empty($storesSubcategories->toArray())) {
            return $this->response->withStatus(200)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'A categoria não pode ser apagada porque que exista em uso em subcategorias.']));
        } else {
            $storesCategory = $this->StoresCategories->get($id);

            if ($this->StoresCategories->delete($storesCategory)) {
                return $this->response->withStatus(200)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'success']));
            }
        }
    }
}
