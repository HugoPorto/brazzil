<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\StoresSuperpas;
use Cake\Utility\Security;

class StoresStripeConfigsController extends AppController
{
    private $showStripeKeys = null;

    public function index()
    {
        $this->hasPermission('storeAdmin');

        if (!$_SESSION['superpass']) {
            $this->Flash->success(__('Faça o login com super usuário para ver sua chave secreta.'));
            $this->showStripeKeys = false;
        } else {
            $this->showStripeKeys = true;
        }

        $storesStripeConfigs = $this->paginate($this->StoresStripeConfigs);

        $this->set(
            [
                'storesStripeConfigs' => $storesStripeConfigs,
                'showStripeKeys' => $this->showStripeKeys
            ]
        );
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $storesStripeConfig = $this->StoresStripeConfigs->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesStripeConfig', $storesStripeConfig);
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $storesStripeConfig = $this->StoresStripeConfigs->newEntity();
        if ($this->request->is('post')) {
            $storesStripeConfig = $this->StoresStripeConfigs->patchEntity($storesStripeConfig, $this->request->getData());
            if ($this->StoresStripeConfigs->save($storesStripeConfig)) {
                $this->Flash->success(__('The stores stripe config has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores stripe config could not be saved. Please, try again.'));
        }
        $users = $this->StoresStripeConfigs->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesStripeConfig', 'users'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        if (!$_SESSION['superpass']) {
            $this->Flash->error(__('Faça login como super usuário para poder proceguir com a edição.'));
            return $this->redirect(['action' => 'login']);
        }

        $storesStripeConfig = $this->StoresStripeConfigs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesStripeConfig = $this->StoresStripeConfigs->patchEntity($storesStripeConfig, $this->request->getData());
            if ($this->StoresStripeConfigs->save($storesStripeConfig)) {
                $this->Flash->success(__('A configuração doi salva com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A configuração não pode ser salva. Por favor tente novamente.'));
        }
        $users = $this->StoresStripeConfigs->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesStripeConfig', 'users'));
    }

    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->request->allowMethod(['post', 'delete']);
        $storesStripeConfig = $this->StoresStripeConfigs->get($id);
        if ($this->StoresStripeConfigs->delete($storesStripeConfig)) {
            $this->Flash->success(__('Configuração apagada com sucesso.'));
        } else {
            $this->Flash->error(__('A configuração não pode ser salva. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->hasPermission('storeAdmin');

        $this->loadModel('StoresSuperpass');

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $pass = Security::hash($this->request->getData()['superpass'], 'sha256', true);

            $data['superpass'] = $pass;

            $storesSuperpass = $this->StoresSuperpass->find(
                'all',
                [
                    'conditions' =>
                        [
                            'StoresSuperpass.superpass =' => $pass
                        ]
                ]
            )->first();

            if (!empty($storesSuperpass)) {
                $_SESSION['superpass'] = true;
            } else {
                $this->Flash->error(__('Senha incorreta..'));
                return $this->redirect(['action' => 'login']);
            }

            return $this->redirect(['action' => 'index']);
        }
    }
}
