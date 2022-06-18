<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresComments Controller
 *
 * @property \App\Model\Table\StoresCommentsTable $StoresComments
 *
 * @method \App\Model\Entity\StoresComment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresCommentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['StoresProducts', 'Users']
        ];
        $storesComments = $this->paginate($this->StoresComments);

        $this->set(compact('storesComments'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Comment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storesComment = $this->StoresComments->get($id, [
            'contain' => ['StoresProducts', 'Users']
        ]);

        $this->set('storesComment', $storesComment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storesComment = $this->StoresComments->newEntity();
        if ($this->request->is('post')) {
            $storesComment = $this->StoresComments->patchEntity($storesComment, $this->request->getData());
            if ($this->StoresComments->save($storesComment)) {
                $this->Flash->success(__('The stores comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores comment could not be saved. Please, try again.'));
        }
        $storesProducts = $this->StoresComments->StoresProducts->find('list', ['limit' => 200]);
        $users = $this->StoresComments->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesComment', 'storesProducts', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Comment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storesComment = $this->StoresComments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesComment = $this->StoresComments->patchEntity($storesComment, $this->request->getData());
            if ($this->StoresComments->save($storesComment)) {
                $this->Flash->success(__('The stores comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores comment could not be saved. Please, try again.'));
        }
        $storesProducts = $this->StoresComments->StoresProducts->find('list', ['limit' => 200]);
        $users = $this->StoresComments->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesComment', 'storesProducts', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesComment = $this->StoresComments->get($id);
        if ($this->StoresComments->delete($storesComment)) {
            $this->Flash->success(__('The stores comment has been deleted.'));
        } else {
            $this->Flash->error(__('The stores comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
