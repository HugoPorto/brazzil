<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresContactsController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $this->paginate = [
            'contain' => ['Users']
        ];
        $storesContacts = $this->paginate($this->StoresContacts);

        $this->set(compact('storesContacts', 'loginMenu'));
    }

    // public function view($id = null)
    // {
    //     if ($this->Auth->user() !== null) {
    //         if ($this->Roles->get($this->Auth->user()['roles_id'])->role === 'storeAdmin') {
    //             $storesContact = $this->StoresContacts->get($id, [
    //                 'contain' => ['Users']
    //             ]);

    //             $this->set('storesContact', $storesContact);
    //         } else {
    //             $this->redirectSignup();
    //         }
    //     } else {
    //         $this->redirectSignup();
    //     }
    // }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesContact = $this->StoresContacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesContact = $this->StoresContacts->patchEntity($storesContact, $this->request->getData());
            if ($this->StoresContacts->save($storesContact)) {
                $this->Flash->success(__('The stores contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores contact could not be saved. Please, try again.'));
        }

        $this->set(compact('storesContact', 'loginMenu'));
    }
}
