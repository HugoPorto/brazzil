<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresCategories Controller
 *
 * @property \App\Model\Table\StoresCategoriesTable $StoresCategories
 *
 * @method \App\Model\Entity\StoresCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresCategoriesController extends AppController
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
        $storesCategories = $this->paginate($this->StoresCategories);

        $this->set(compact('storesCategories'));
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
        $storesCategory = $this->StoresCategories->get($id, [
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
        $storesCategory = $this->StoresCategories->newEntity();
        if ($this->request->is('post')) {
            $storesCategory = $this->StoresCategories->patchEntity($storesCategory, $this->request->getData());
            if ($this->StoresCategories->save($storesCategory)) {
                $this->Flash->success(__('The stores category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores category could not be saved. Please, try again.'));
        }
        $users = $this->StoresCategories->Users->find('list', ['limit' => 200]);
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
        $storesCategory = $this->StoresCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesCategory = $this->StoresCategories->patchEntity($storesCategory, $this->request->getData());
            if ($this->StoresCategories->save($storesCategory)) {
                $this->Flash->success(__('The stores category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores category could not be saved. Please, try again.'));
        }
        $users = $this->StoresCategories->Users->find('list', ['limit' => 200]);
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
        $storesCategory = $this->StoresCategories->get($id);
        if ($this->StoresCategories->delete($storesCategory)) {
            $this->Flash->success(__('The stores category has been deleted.'));
        } else {
            $this->Flash->error(__('The stores category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
