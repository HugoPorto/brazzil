<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresCategorys Controller
 *
 * @property \App\Model\Table\StoresCategorysTable $StoresCategorys
 *
 * @method \App\Model\Entity\StoresCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresCategorysController extends AppController
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
        $storesCategorys = $this->paginate($this->StoresCategorys);

        $this->set(compact('storesCategorys'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storesCategory = $this->StoresCategorys->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesCategory', $storesCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storesCategory = $this->StoresCategorys->newEntity();
        if ($this->request->is('post')) {
            $storesCategory = $this->StoresCategorys->patchEntity($storesCategory, $this->request->getData());
            if ($this->StoresCategorys->save($storesCategory)) {
                $this->Flash->success(__('The stores category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores category could not be saved. Please, try again.'));
        }
        $users = $this->StoresCategorys->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesCategory', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storesCategory = $this->StoresCategorys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesCategory = $this->StoresCategorys->patchEntity($storesCategory, $this->request->getData());
            if ($this->StoresCategorys->save($storesCategory)) {
                $this->Flash->success(__('The stores category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores category could not be saved. Please, try again.'));
        }
        $users = $this->StoresCategorys->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesCategory', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesCategory = $this->StoresCategorys->get($id);
        if ($this->StoresCategorys->delete($storesCategory)) {
            $this->Flash->success(__('The stores category has been deleted.'));
        } else {
            $this->Flash->error(__('The stores category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
