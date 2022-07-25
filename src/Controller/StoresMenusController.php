<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresMenus Controller
 *
 * @property \App\Model\Table\StoresMenusTable $StoresMenus
 *
 * @method \App\Model\Entity\StoresMenu[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresMenusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['StoresCourses', 'Users', 'Companys']
        ];
        $storesMenus = $this->paginate($this->StoresMenus);

        $this->set(compact('storesMenus'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Menu id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storesMenu = $this->StoresMenus->get($id, [
            'contain' => ['StoresCourses', 'Users', 'Companys']
        ]);

        $this->set('storesMenu', $storesMenu);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storesMenu = $this->StoresMenus->newEntity();
        if ($this->request->is('post')) {
            $storesMenu = $this->StoresMenus->patchEntity($storesMenu, $this->request->getData());
            if ($this->StoresMenus->save($storesMenu)) {
                $this->Flash->success(__('The stores menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores menu could not be saved. Please, try again.'));
        }
        $storesCourses = $this->StoresMenus->StoresCourses->find('list', ['limit' => 200]);
        $users = $this->StoresMenus->Users->find('list', ['limit' => 200]);
        $companys = $this->StoresMenus->Companys->find('list', ['limit' => 200]);
        $this->set(compact('storesMenu', 'storesCourses', 'users', 'companys'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Menu id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storesMenu = $this->StoresMenus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesMenu = $this->StoresMenus->patchEntity($storesMenu, $this->request->getData());
            if ($this->StoresMenus->save($storesMenu)) {
                $this->Flash->success(__('The stores menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores menu could not be saved. Please, try again.'));
        }
        $storesCourses = $this->StoresMenus->StoresCourses->find('list', ['limit' => 200]);
        $users = $this->StoresMenus->Users->find('list', ['limit' => 200]);
        $companys = $this->StoresMenus->Companys->find('list', ['limit' => 200]);
        $this->set(compact('storesMenu', 'storesCourses', 'users', 'companys'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Menu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesMenu = $this->StoresMenus->get($id);
        if ($this->StoresMenus->delete($storesMenu)) {
            $this->Flash->success(__('The stores menu has been deleted.'));
        } else {
            $this->Flash->error(__('The stores menu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
