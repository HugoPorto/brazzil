<?php

namespace App\Controller;

use App\Controller\AppController;

class ConfigsController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $configs = $this->paginate($this->Configs);

        $this->set(compact('configs'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $config = $this->Configs->find('all', [
            'conditions' => [
                'Configs.users_id =' => $this->Auth->user()['id']
            ]
        ]);

        $this->set('config', $config->toArray()[0]);
    }

    public function add()
    {
        $config = $this->Configs->newEntity();
        if ($this->request->is('post')) {
            $config = $this->Configs->patchEntity($config, $this->request->getData());
            if ($this->Configs->save($config)) {
                $this->Flash->success(__('The config has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The config could not be saved. Please, try again.'));
        }
        $users = $this->Configs->Users->find('list', ['limit' => 200]);
        $this->set(compact('config', 'users'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $config = $this->Configs->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = [];

            $data = $this->request->getData();

            if (!array_key_exists("status_banner_main", $data)) {
                $data['status_banner_main'] = '0';
            } else {
                $data['status_banner_main'] = '1';
            }

            if (array_key_exists("fisic", $data) && array_key_exists("digital", $data)) {
                // $data['show_type_products'] = '3';
                return $this->redirect(['controller' => 'Pages', 'action' => 'error', base64_encode('Essa configuração ainda não está disponível.')]);
            } elseif (array_key_exists("fisic", $data) && !array_key_exists("digital", $data)) {
                $data['show_type_products'] = '1';
            } elseif (!array_key_exists("fisic", $data) && !array_key_exists("digital", $data)) {
                $data['show_type_products'] = '1';
            } elseif (!array_key_exists("fisic", $data) && array_key_exists("digital", $data)) {
                $data['show_type_products'] = '2';
            }

            $config = $this->Configs->patchEntity($config, $data);

            if ($this->Configs->save($config)) {
                return $this->redirect(['action' => 'view']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', base64_encode('Erro ao editar configuração.')]);
        }

        $this->set(compact('config', 'users'));
    }

    public function updateStatusBannerPromocional($id = null, $status_banner = null)
    {
        $this->hasPermission('storeAdmin');

        $id = base64_decode($id);
        $status_banner = base64_decode($status_banner);
        $config = $this->Configs->get($id);

        if ($this->request->is(['get'])) {
            $data = [];

            $data['status_banner_main'] = $status_banner === '1' ? '0' : '1';

            $config = $this->Configs->patchEntity($config, $data);

            if ($this->Configs->save($config)) {
                return $this->redirect(['action' => 'view']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', base64_encode('Erro ao editar configuração.')]);
        }
    }

    public function updateShowProducts($id = null, $show_type_products = null)
    {
        $this->hasPermission('storeAdmin');

        $id = base64_decode($id);
        $show_type_products = base64_decode($show_type_products);
        $config = $this->Configs->get($id);

        if ($this->request->is(['get'])) {
            $data = [];

            $data['show_type_products'] = $show_type_products === '1' ? '2' : '1';

            $config = $this->Configs->patchEntity($config, $data);

            if ($this->Configs->save($config)) {
                return $this->redirect(['action' => 'view']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', base64_encode('Erro ao editar configuração.')]);
        }
    }
}
