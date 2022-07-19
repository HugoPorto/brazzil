<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresVideosController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Base64');
    }

    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesVideos = $this->StoresVideos->find('all', [
            'contain' => ['StoresCourses']
        ]);

        $this->set(compact('storesVideos'));
    }

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

        $this->loadModel('VideosVieweds');

        $storesVideo = $this->StoresVideos->get($id, [
            'contain' => ['StoresCourses', 'Users']
        ]);


        $viewed = $this->VideosVieweds->find(
            'all',
            [
                'conditions' => [
                    'VideosVieweds.stores_courses_id =' => $storesVideo->stores_courses_id,
                    'VideosVieweds.stores_videos_id =' => $storesVideo->id,
                ]
            ]
        );

        $this->set(compact('storesVideo', 'viewed'));
    }

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
