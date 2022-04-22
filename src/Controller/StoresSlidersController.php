<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

class StoresSlidersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UploadSlider');
    }

    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->paginate = [
            'contain' => ['Users']
        ];
        $storesSliders = $this->paginate($this->StoresSliders);

        $this->set(compact('storesSliders'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $storesSlider = $this->StoresSliders->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesSlider', $storesSlider);
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $storesSlider = $this->StoresSliders->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if (!empty($this->request->getData()['slider'][0]['name'])) {
                $this->UploadSlider->upload($this->request->getData()['slider'], $this->request->getData()['galerys_id']);
                $data['slider'] = $this->request->getData()['slider']['0']['name'];
            }

            $storesSlider = $this->StoresSliders->patchEntity($storesSlider, $data);

            if ($this->StoresSliders->save($storesSlider)) {
                $this->Flash->success(__('The stores slider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores slider could not be saved. Please, try again.'));
        }
        $users = $this->StoresSliders->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesSlider', 'users'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $storesSlider = $this->StoresSliders->get($id, [
            'contain' => []
        ]);

        $beforeSlider = $storesSlider->slider;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            if (!empty($this->request->getData()['slider'][0]['name'])) {
                $this->UploadSlider->upload($this->request->getData()['slider'], $this->request->getData()['galerys_id'], $id);

                if ((int) $this->request->getData()['slider'][0]['size'] < 2000000) {
                    $fileToDelete = WWW_ROOT . 'img' . DS . 'galerys' . DS . '12' . DS . $beforeSlider;

                    $file = new File($fileToDelete);

                    $file->delete();

                    $file->close();

                    $session = $this->request->getSession();

                    $data['slider'] = $session->read('fileImageName');

                    $session->delete('fileImageName');
                }
            } else {
                $data['slider'] = '';
            }

            $storesSlider = $this->StoresSliders->patchEntity($storesSlider, $data);

            if ($this->StoresSliders->save($storesSlider)) {
                $this->Flash->success(__('O Banner foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('O Banner não pode ser salvo. Por favor, tente novamente.'));
        }

        $this->set(compact('storesSlider'));
    }

    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->request->allowMethod(['post', 'delete']);
        $storesSlider = $this->StoresSliders->get($id);
        if ($this->StoresSliders->delete($storesSlider)) {
            $this->Flash->success(__('The stores slider has been deleted.'));
        } else {
            $this->Flash->error(__('The stores slider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
