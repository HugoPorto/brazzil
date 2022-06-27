<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresTerms Controller
 *
 * @property \App\Model\Table\StoresTermsTable $StoresTerms
 *
 * @method \App\Model\Entity\StoresTerm[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresTermsController extends AppController
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

        $this->paginate = [
            'contain' => ['Users']
        ];
        $storesTerms = $this->paginate($this->StoresTerms);

        $this->set(compact('storesTerms'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Term id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesTerm = $this->StoresTerms->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesTerm', $storesTerm);
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

        $storesTerm = $this->StoresTerms->newEntity();
        if ($this->request->is('post')) {
            $storesTerm = $this->StoresTerms->patchEntity($storesTerm, $this->request->getData());
            if ($this->StoresTerms->save($storesTerm)) {
                $this->Flash->success(__('The stores term has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores term could not be saved. Please, try again.'));
        }
        $users = $this->StoresTerms->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesTerm', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Term id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesTerm = $this->StoresTerms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesTerm = $this->StoresTerms->patchEntity($storesTerm, $this->request->getData());
            if ($this->StoresTerms->save($storesTerm)) {
                $this->Flash->success(__('The stores term has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores term could not be saved. Please, try again.'));
        }
        $users = $this->StoresTerms->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesTerm', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Term id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $this->request->allowMethod(['post', 'delete']);
        $storesTerm = $this->StoresTerms->get($id);
        if ($this->StoresTerms->delete($storesTerm)) {
            $this->Flash->success(__('The stores term has been deleted.'));
        } else {
            $this->Flash->error(__('The stores term could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
