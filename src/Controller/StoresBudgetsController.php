<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresBudgets Controller
 *
 * @property \App\Model\Table\StoresBudgetsTable $StoresBudgets
 *
 * @method \App\Model\Entity\StoresBudget[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresBudgetsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesBudgets = $this->StoresBudgets->find('all');

        $this->set(compact('storesBudgets'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Budget id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesBudget = $this->StoresBudgets->get($id, [
            'contain' => []
        ]);

        $this->set('storesBudget', $storesBudget);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storesBudget = $this->StoresBudgets->newEntity();
        if ($this->request->is('post')) {
            $storesBudget = $this->StoresBudgets->patchEntity($storesBudget, $this->request->getData());
            if ($this->StoresBudgets->save($storesBudget)) {
                $this->Flash->success(__('The stores budget has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
        }
        $this->set(compact('storesBudget'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Budget id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storesBudget = $this->StoresBudgets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesBudget = $this->StoresBudgets->patchEntity($storesBudget, $this->request->getData());
            if ($this->StoresBudgets->save($storesBudget)) {
                $this->Flash->success(__('The stores budget has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores budget could not be saved. Please, try again.'));
        }
        $this->set(compact('storesBudget'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Budget id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesBudget = $this->StoresBudgets->get($id);
        if ($this->StoresBudgets->delete($storesBudget)) {
            $this->Flash->success(__('The stores budget has been deleted.'));
        } else {
            $this->Flash->error(__('The stores budget could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
