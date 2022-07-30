<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresAddressController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesAddress = $this->StoresAddress->find('all', [
            'contain' => ['StoresDemands', 'Users']
        ]);

        $this->set(compact('storesAddress'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesAddres = $this->StoresAddress->get($id, [
            'contain' => ['StoresDemands', 'Users']
        ]);

        $this->set(compact('storesAddres'));
    }

    public function getAddress($id = null)
    {
        $this->autoRender = false;

        $this->hasPermission('storeAdmin');

        $storesAddres = $this->StoresAddress->find('all', [
            'contain' => ['StoresDemands', 'Users'],
            'conditions' => [
                'StoresAddress.stores_demands_id =' => $id
            ]
        ])->first();

        echo json_encode($storesAddres);
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $storesAddres = $this->StoresAddress->newEntity();

        if ($this->request->is('post')) {
            $storesAddres = $this->StoresAddress->patchEntity($storesAddres, $this->request->getData());

            if ($this->StoresAddress->save($storesAddres)) {
                $this->Flash->success(__('The stores addres has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The stores addres could not be saved. Please, try again.'));
        }

        $storesDemands = $this->StoresAddress->StoresDemands->find('list', ['limit' => 200]);

        $users = $this->StoresAddress->Users->find('list', ['limit' => 200]);

        $this->set(compact('storesAddres', 'storesDemands', 'users'));
    }

    public function addSession()
    {
        $session = $this->request->getSession();

        $session->write('address_demand', $this->request->getData());

        if ($this->request->getSession()->read('cpf')) {
            return $this->redirect(['controller' => 'stripes', 'action' => 'stripe']);
        } else {
            return $this->redirect(['controller' => 'Users', 'action' => 'cpf']);
        }
    }
}
