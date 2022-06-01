<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresFinalcategories Controller
 *
 * @property \App\Model\Table\StoresFinalcategoriesTable $StoresFinalcategories
 *
 * @method \App\Model\Entity\StoresFinalcategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresFinalcategoriesController extends AppController
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

        $storesFinalcategories = $this->StoresFinalcategories->find('all', [
            'contain' => ['StoresSubcategories']
        ]);

        $this->set(compact('storesFinalcategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Finalcategory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesFinalcategory = $this->StoresFinalcategories->get($id, [
            'contain' => ['StoresSubcategories', 'Users']
        ]);

        $this->set('storesFinalcategory', $storesFinalcategory);
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

        $storesFinalcategory = $this->StoresFinalcategories->newEntity();
        if ($this->request->is('post')) {
            $storesFinalcategory = $this->StoresFinalcategories->patchEntity($storesFinalcategory, $this->request->getData());
            if ($this->StoresFinalcategories->save($storesFinalcategory)) {
                return $this->redirect(['action' => 'index']);
            }
        }
        $storesSubcategories = $this->StoresFinalcategories->StoresSubcategories->find(
            'list',
            [
                'limit' => 1000
            ]
        );

        $this->set(compact('storesFinalcategory', 'storesSubcategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Finalcategory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesFinalcategory = $this->StoresFinalcategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesFinalcategory = $this->StoresFinalcategories->patchEntity($storesFinalcategory, $this->request->getData());
            if ($this->StoresFinalcategories->save($storesFinalcategory)) {
                return $this->redirect(['action' => 'index']);
            }
        }

        $storesSubcategories = $this->StoresFinalcategories->StoresSubcategories->find(
            'list',
            [
                'limit' => 1000
            ]
        );

        $this->set(compact('storesFinalcategory', 'storesSubcategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Finalcategory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->request->allowMethod(['post', 'delete']);
        $storesFinalcategory = $this->StoresFinalcategories->get($id);

        if ($this->StoresFinalcategories->delete($storesFinalcategory)) {
            $this->Flash->success(__('The stores finalcategory has been deleted.'));
        } else {
            $this->Flash->error(__('The stores finalcategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function loadFinalcategoryByIdSubcategory($idSubcategory)
    {
        $this->autoRender = false;

        $this->hasPermission('storeAdmin');

        $storesFinalcategories = $this->StoresFinalcategories->find('all', [
            'conditions' => [
                'StoresFinalcategories.stores_subcategories_id =' => $idSubcategory
            ]
        ]);

        if (empty($storesFinalcategories->toArray())) {
            return $this->response->withStatus(404)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'Não foram encontrados registros!']));
        } else {
            return $this->response->withStatus(200)->withType('application/json')
                ->withStringBody(json_encode($storesFinalcategories->toArray()));
        }
    }
}
