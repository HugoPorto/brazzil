<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresCourses Controller
 *
 * @property \App\Model\Table\StoresCoursesTable $StoresCourses
 *
 * @method \App\Model\Entity\StoresCourse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresCoursesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Base64');
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

        $storesCourses = $this->StoresCourses->find('all');

        $this->set(compact('storesCourses'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Course id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesCourse = $this->StoresCourses->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesCourse', $storesCourse);
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

        $storesCourse = $this->StoresCourses->newEntity();

        if ($this->request->is('post')) {
            $data = [];
            $data = $this->request->getData();

            $photo = $this->Base64->processMainPhoto($this->request->getData());

            $data['photo'] = $photo;

            $storesCourse = $this->StoresCourses->patchEntity($storesCourse, $data);
            if ($this->StoresCourses->save($storesCourse)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser salvo.']);
        }

        $this->set(compact('storesCourse'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Course id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesCourse = $this->StoresCourses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesCourse = $this->StoresCourses->patchEntity($storesCourse, $this->request->getData());

            if ($this->StoresCourses->save($storesCourse)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser salvo.']);
        }
        $users = $this->StoresCourses->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesCourse', 'users'));
    }

    public function editPhoto($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesCourse = $this->StoresCourses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = [];
            $data = $this->request->getData();

            $photo = $this->Base64->processMainPhoto($this->request->getData());

            $data['photo'] = $photo;

            $storesCourse = $this->StoresCourses->patchEntity($storesCourse, $data);
            if ($this->StoresCourses->save($storesCourse)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser salvo.']);
        }
        $users = $this->StoresCourses->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesCourse', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $this->request->allowMethod(['post', 'delete']);
        $storesCourse = $this->StoresCourses->get($id);
        if (!$this->StoresCourses->delete($storesCourse)) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser apagado.']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
