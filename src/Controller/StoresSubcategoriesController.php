<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresSubcategories Controller
 *
 * @property \App\Model\Table\StoresSubcategoriesTable $StoresSubcategories
 *
 * @method \App\Model\Entity\StoresSubcategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresSubcategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesSubcategories = $this->StoresSubcategories->find(
            'all',
            [
            'contain' => ['StoresCategories']
            ]
        );

        $this->set(compact('storesSubcategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Subcategory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesSubcategory = $this->StoresSubcategories->get($id, [
            'contain' => ['StoresCategories', 'Users']
        ]);

        $this->set('storesSubcategory', $storesSubcategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesSubcategory = $this->StoresSubcategories->newEntity();
        if ($this->request->is('post')) {
            $storesSubcategory = $this->StoresSubcategories->patchEntity($storesSubcategory, $this->request->getData());
            if ($this->StoresSubcategories->save($storesSubcategory)) {
                $this->Flash->success(__('The stores subcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores subcategory could not be saved. Please, try again.'));
        }
        $storesCategories = $this->StoresSubcategories->StoresCategories->find('list', ['limit' => 200]);
        $users = $this->StoresSubcategories->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesSubcategory', 'storesCategories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Subcategory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesSubcategory = $this->StoresSubcategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesSubcategory = $this->StoresSubcategories->patchEntity($storesSubcategory, $this->request->getData());
            if ($this->StoresSubcategories->save($storesSubcategory)) {
                $this->Flash->success(__('The stores subcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores subcategory could not be saved. Please, try again.'));
        }
        $storesCategories = $this->StoresSubcategories->StoresCategories->find('list', ['limit' => 200]);
        $users = $this->StoresSubcategories->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesSubcategory', 'storesCategories', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Subcategory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->loadModel('StoresFinalCategories');

        $finalCategories = $this->StoresFinalCategories->find('all', [
            'conditions' => [
                'StoresFinalCategories.stores_subcategories_id =' => $id
            ]
        ]);

        if (!empty($finalCategories->toArray())) {
            echo 'A subcategoria não pode ser apagada porque existe uma categoria final associada.';
            exit();
        } else {
            $storesSubcategory = $this->StoresSubcategories->get($id);

            if ($this->StoresSubcategories->delete($storesSubcategory)) {
                echo 'success';
                exit();
            }
        }
    }

    public function loadSubcategoryByIdcategory($idCategory)
    {
        $this->autoRender = false;

        $this->hasPermission('storeAdmin');

        $storesSubcategories = $this->StoresSubcategories->find('all', [
            'conditions' => [
                'StoresSubcategories.stores_categories_id =' => $idCategory
            ]
        ]);

        if (empty($storesSubcategories->toArray())) {
            return $this->response->withStatus(404)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'Não foram encontrados registros!']));
        } else {
            return $this->response->withStatus(200)->withType('application/json')
                ->withStringBody(json_encode($storesSubcategories->toArray()));
        }
    }
}
