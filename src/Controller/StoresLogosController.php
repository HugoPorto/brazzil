<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

class StoresLogosController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UploadLogo');
    }

    public function index()
    {
        $this->hasPermission('storeAdmin');

        $storesLogos = $this->paginate($this->StoresLogos);

        $this->set(compact('storesLogos'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $storesLogo = $this->StoresLogos->get($id, [
            'contain' => []
        ]);

        $this->set('storesLogo', $storesLogo);
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $storesLogo = $this->StoresLogos->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if (!empty($this->request->getData()['logo'][0]['name'])) {
                $this->UploadLogo->upload($this->request->getData()['logo'], $this->request->getData()['galerys_id']);

                $session = $this->request->getSession();

                $data['logo'] = $session->read('fileImageName');
            }

            $storesLogo = $this->StoresLogos->patchEntity($storesLogo, $data);
            if ($this->StoresLogos->save($storesLogo)) {
                $this->Flash->success(__('The stores logo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores logo could not be saved. Please, try again.'));
        }
        $this->set(compact('storesLogo'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $storesLogo = $this->StoresLogos->get($id, [
            'contain' => []
        ]);

        $beforeLogo = $storesLogo->logo;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            // debug($data);
            // exit();

            if (!empty($this->request->getData()['logo'][0]['name'])) {
                $this->UploadLogo->upload($this->request->getData()['logo'], $this->request->getData()['galerys_id'], $id);

                if ((int) $this->request->getData()['logo'][0]['size'] < 2000000) {
                    $fileToDelete = WWW_ROOT . 'img' . DS . 'galerys' . DS . '13' . DS . $beforeLogo;

                    $file = new File($fileToDelete);

                    $file->delete();

                    $file->close();

                    $session = $this->request->getSession();

                    $data['logo'] = $session->read('fileImageName');

                    $session->delete('fileImageName');
                }
            } else {
                $data['logo'] = '';
            }

            $storesLogo = $this->StoresLogos->patchEntity($storesLogo, $data);
            if ($this->StoresLogos->save($storesLogo)) {
                $this->Flash->success(__('The stores logo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores logo could not be saved. Please, try again.'));
        }
        $this->set(compact('storesLogo'));
    }

    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->request->allowMethod(['post', 'delete']);
        $storesLogo = $this->StoresLogos->get($id);
        if ($this->StoresLogos->delete($storesLogo)) {
            $this->Flash->success(__('The stores logo has been deleted.'));
        } else {
            $this->Flash->error(__('The stores logo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
