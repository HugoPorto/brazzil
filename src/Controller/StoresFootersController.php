<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresFootersController extends AppController
{
    public function index()
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'storeAdmin') {
                $this->paginate = [
                    'contain' => ['Users']
                ];
                $storesFooters = $this->paginate($this->StoresFooters);

                $this->set(compact('storesFooters'));
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    public function view($id = null)
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'storeAdmin') {
                $storesFooter = $this->StoresFooters->get($id, [
                    'contain' => ['Users']
                ]);

                $this->set('storesFooter', $storesFooter);
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    public function edit($id = null)
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'storeAdmin') {
                $storesFooter = $this->StoresFooters->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $storesFooter = $this->StoresFooters->patchEntity($storesFooter, $this->request->getData());
                    if ($this->StoresFooters->save($storesFooter)) {
                        $this->Flash->success(__('The stores footer has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The stores footer could not be saved. Please, try again.'));
                }
                $users = $this->StoresFooters->Users->find('list', ['limit' => 200]);
                $this->set(compact('storesFooter', 'users'));
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }
}
