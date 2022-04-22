<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresConfigs Controller
 *
 * @property \App\Model\Table\StoresConfigsTable $StoresConfigs
 *
 * @method \App\Model\Entity\StoresConfig[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresConfigsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $storesConfigs = $this->paginate($this->StoresConfigs);

        $this->set(compact('storesConfigs'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Config id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storesConfig = $this->StoresConfigs->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesConfig', $storesConfig);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storesConfig = $this->StoresConfigs->newEntity();
        if ($this->request->is('post')) {
            $storesConfig = $this->StoresConfigs->patchEntity($storesConfig, $this->request->getData());
            if ($this->StoresConfigs->save($storesConfig)) {
                $this->Flash->success(__('The stores config has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores config could not be saved. Please, try again.'));
        }
        $users = $this->StoresConfigs->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesConfig', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Config id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storesConfig = $this->StoresConfigs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesConfig = $this->StoresConfigs->patchEntity($storesConfig, $this->request->getData());
            if ($this->StoresConfigs->save($storesConfig)) {
                $this->Flash->success(__('The stores config has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores config could not be saved. Please, try again.'));
        }
        $users = $this->StoresConfigs->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesConfig', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Config id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesConfig = $this->StoresConfigs->get($id);
        if ($this->StoresConfigs->delete($storesConfig)) {
            $this->Flash->success(__('The stores config has been deleted.'));
        } else {
            $this->Flash->error(__('The stores config could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
