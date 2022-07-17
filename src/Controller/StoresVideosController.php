<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresVideos Controller
 *
 * @property \App\Model\Table\StoresVideosTable $StoresVideos
 *
 * @method \App\Model\Entity\StoresVideo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresVideosController extends AppController
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

        $storesVideos = $this->StoresVideos->find('all', [
            'contain' => ['StoresCourses']
        ]);

        $this->set(compact('storesVideos'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Video id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesVideo = $this->StoresVideos->get($id, [
            'contain' => ['StoresCourses', 'Users']
        ]);

        $this->set('storesVideo', $storesVideo);
    }

    public function video($id = null)
    {
        $this->hasPermission('store');

        $this->viewBuilder()->setLayout('brazzil');

        $storesVideo = $this->StoresVideos->get($id, [
            'contain' => ['StoresCourses', 'Users']
        ]);

        $this->set('storesVideo', $storesVideo);
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

        $storesVideo = $this->StoresVideos->newEntity();

        if ($this->request->is('post')) {
            $data = [];

            $data = $this->request->getData();

            $photo = $this->Base64->processMainPhoto($this->request->getData());

            $data['photo'] = $photo;

            $data['viewed'] = false;

            $storesVideo = $this->StoresVideos->patchEntity($storesVideo, $data);

            if ($this->StoresVideos->save($storesVideo)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(
                [
                    'controller' => 'Pages',
                    'action' => 'error', 'O video não poder ser salvo.'
                ]
            );
        }
        $storesCourses = $this->StoresVideos->StoresCourses->find('list', ['limit' => 200]);
        $users = $this->StoresVideos->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesVideo', 'storesCourses', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Video id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesVideo = $this->StoresVideos->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesVideo = $this->StoresVideos->patchEntity($storesVideo, $this->request->getData());
            if ($this->StoresVideos->save($storesVideo)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(
                [
                    'controller' => 'Pages',
                    'action' => 'error', 'O video não poder ser salvo.'
                ]
            );
        }

        $storesCourses = $this->StoresVideos->StoresCourses->find('list', ['limit' => 200]);

        $users = $this->StoresVideos->Users->find('list', ['limit' => 200]);

        $this->set(compact('storesVideo', 'storesCourses', 'users'));
    }

    public function editPhoto($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesVideo = $this->StoresVideos->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = [];

            $data = $this->request->getData();

            $photo = $this->Base64->processMainPhoto($this->request->getData());

            $data['photo'] = $photo;

            $storesVideo = $this->StoresVideos->patchEntity($storesVideo, $data);

            if ($this->StoresVideos->save($storesVideo)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(
                [
                    'controller' => 'Pages',
                    'action' => 'error', 'O video não poder ser salvo.'
                ]
            );
        }

        $storesCourses = $this->StoresVideos->StoresCourses->find('list', ['limit' => 200]);

        $users = $this->StoresVideos->Users->find('list', ['limit' => 200]);

        $this->set(compact('storesVideo', 'storesCourses', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Video id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesVideo = $this->StoresVideos->get($id);
        if ($this->StoresVideos->delete($storesVideo)) {
            $this->Flash->success(__('The stores video has been deleted.'));
        } else {
            $this->Flash->error(__('The stores video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
