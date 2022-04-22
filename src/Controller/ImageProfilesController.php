<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class ImageProfilesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UploadImageProfile');
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Galerys', 'Users']
        ];
        $imageProfiles = $this->paginate($this->ImageProfiles);

        $this->set(compact('imageProfiles'));
    }

    public function view($id = null)
    {
        $imageProfile = $this->ImageProfiles->get($id, [
            'contain' => ['Galerys', 'Users']
        ]);

        $this->set('imageProfile', $imageProfile);
    }

    public function add()
    {
        $imageProfile = $this->ImageProfiles->newEntity();

        if ($this->request->is('post')) {
            $this->UploadImageProfile->upload($this->request->data['image'], $this->request->data['galerys_id'], $this->request->data['users_id']);
        }

        $galerys = $this->ImageProfiles->Galerys->find('list', ['limit' => 200]);
        $users = $this->ImageProfiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('imageProfile', 'galerys', 'users'));
    }

    public function edit($id = null)
    {
        $imageProfile = $this->ImageProfiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imageProfile = $this->ImageProfiles->patchEntity($imageProfile, $this->request->getData());
            if ($this->ImageProfiles->save($imageProfile)) {
                $this->Flash->success(__('The image profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image profile could not be saved. Please, try again.'));
        }
        $galerys = $this->ImageProfiles->Galerys->find('list', ['limit' => 200]);
        $users = $this->ImageProfiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('imageProfile', 'galerys', 'users'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imageProfile = $this->ImageProfiles->get($id);
        $galery = $imageProfile->galerys_id;
        $filename = $imageProfile->image;
        $dir = WWW_ROOT . 'img' . DS . 'galerys' . DS . $galery . DS . $filename;

        if ($this->ImageProfiles->delete($imageProfile)) {
            $file = new File($dir);
            $file->delete();
            $file->close();
            $this->Flash->success(__('The image profile has been deleted.'));
        } else {
            $this->Flash->error(__('The image profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
