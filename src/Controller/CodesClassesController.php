<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CodesClasses Controller
 *
 * @property \App\Model\Table\CodesClassesTable $CodesClasses
 *
 * @method \App\Model\Entity\CodesClass[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CodesClassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['StoresCourses', 'Companys', 'Users', 'StoresMenus']
        ];
        $codesClasses = $this->paginate($this->CodesClasses);

        $this->set(compact('codesClasses'));
    }

    /**
     * View method
     *
     * @param string|null $id Codes Class id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $codesClass = $this->CodesClasses->get($id, [
            'contain' => ['StoresCourses', 'Companys', 'Users', 'StoresMenus']
        ]);

        $this->set('codesClass', $codesClass);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $codesClass = $this->CodesClasses->newEntity();
        if ($this->request->is('post')) {
            $codesClass = $this->CodesClasses->patchEntity($codesClass, $this->request->getData());
            if ($this->CodesClasses->save($codesClass)) {
                $this->Flash->success(__('The codes class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The codes class could not be saved. Please, try again.'));
        }
        $storesCourses = $this->CodesClasses->StoresCourses->find('list', ['limit' => 200]);
        $companys = $this->CodesClasses->Companys->find('list', ['limit' => 200]);
        $users = $this->CodesClasses->Users->find('list', ['limit' => 200]);
        $storesMenus = $this->CodesClasses->StoresMenus->find('list', ['limit' => 200]);
        $this->set(compact('codesClass', 'storesCourses', 'companys', 'users', 'storesMenus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Codes Class id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $codesClass = $this->CodesClasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $codesClass = $this->CodesClasses->patchEntity($codesClass, $this->request->getData());
            if ($this->CodesClasses->save($codesClass)) {
                $this->Flash->success(__('The codes class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The codes class could not be saved. Please, try again.'));
        }
        $storesCourses = $this->CodesClasses->StoresCourses->find('list', ['limit' => 200]);
        $companys = $this->CodesClasses->Companys->find('list', ['limit' => 200]);
        $users = $this->CodesClasses->Users->find('list', ['limit' => 200]);
        $storesMenus = $this->CodesClasses->StoresMenus->find('list', ['limit' => 200]);
        $this->set(compact('codesClass', 'storesCourses', 'companys', 'users', 'storesMenus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Codes Class id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $codesClass = $this->CodesClasses->get($id);
        if ($this->CodesClasses->delete($codesClass)) {
            $this->Flash->success(__('The codes class has been deleted.'));
        } else {
            $this->Flash->error(__('The codes class could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
