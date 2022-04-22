<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresAddressController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->paginate = [
            'contain' => ['StoresDemands', 'Users']
        ];
        $storesAddress = $this->paginate($this->StoresAddress);

        $this->set(compact('storesAddress'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $storesAddres = $this->StoresAddress->get($id, [
            'contain' => ['StoresDemands', 'Users']
        ]);

        $this->set('storesAddres', $storesAddres);
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

    // public function edit($id = null)
    // {
    //     $storesAddres = $this->StoresAddress->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $storesAddres = $this->StoresAddress->patchEntity($storesAddres, $this->request->getData());
    //         if ($this->StoresAddress->save($storesAddres)) {
    //             $this->Flash->success(__('The stores addres has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The stores addres could not be saved. Please, try again.'));
    //     }
    //     $storesDemands = $this->StoresAddress->StoresDemands->find('list', ['limit' => 200]);
    //     $users = $this->StoresAddress->Users->find('list', ['limit' => 200]);
    //     $this->set(compact('storesAddres', 'storesDemands', 'users'));
    // }

    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $storesAddres = $this->StoresAddress->get($id);
    //     if ($this->StoresAddress->delete($storesAddres)) {
    //         $this->Flash->success(__('The stores addres has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The stores addres could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }


    public function addSession()
    {
        $session = $this->request->getSession();

        $session->write('address_demand', $this->request->getData());

        return $this->redirect(['controller' => 'stripes', 'action' => 'stripe']);
    }
}
