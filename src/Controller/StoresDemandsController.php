<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresDemandsController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesDemands = $this->StoresDemands->find('all', ['contain' => 'Users']);

        $this->set(compact('storesDemands', 'loginMenu'));
    }


    public function view($id = null)
    {
        $storesDemand = $this->StoresDemands->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesDemand', $storesDemand);
    }


    public function add()
    {
        $storesDemand = $this->StoresDemands->newEntity();
        if ($this->request->is('post')) {
            $storesDemand = $this->StoresDemands->patchEntity($storesDemand, $this->request->getData());
            if ($this->StoresDemands->save($storesDemand)) {
                $this->Flash->success(__('The stores demand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores demand could not be saved. Please, try again.'));
        }
        $users = $this->StoresDemands->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesDemand', 'users'));
    }

    public function edit($id = null)
    {
        $storesDemand = $this->StoresDemands->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesDemand = $this->StoresDemands->patchEntity($storesDemand, $this->request->getData());
            if ($this->StoresDemands->save($storesDemand)) {
                $this->Flash->success(__('The stores demand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores demand could not be saved. Please, try again.'));
        }
        $users = $this->StoresDemands->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesDemand', 'users'));
    }

    public function updateStatusDemand($id)
    {
        $this->autoRender = false;

        $this->hasPermission('storeAdmin');

        $storesDemand = $this->StoresDemands->get($id, [
            'contain' => []
        ]);

        $data = [
            'status' => true
        ];

        $storesDemand = $this->StoresDemands->patchEntity($storesDemand, $data);

        if ($this->StoresDemands->save($storesDemand)) {
            echo 'success';
            exit();
        } else {
            echo 'Erro ao atualizar status.';
            exit();
        }
    }
}
