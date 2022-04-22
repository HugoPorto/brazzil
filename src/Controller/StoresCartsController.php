<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresCartsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add']);
    }

    public function index()
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $this->paginate = [
                'contain' => ['StoresProducts', 'Users']
            ];
            $storesCarts = $this->paginate($this->StoresCarts);

            $this->set(compact('storesCarts'));
        } else {
            $this->redirectSignup();
        }
    }

    public function view($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $storesCart = $this->StoresCarts->get($id, [
                'contain' => ['StoresProducts', 'Users']
            ]);

            $this->set('storesCart', $storesCart);
        } else {
            $this->redirectSignup();
        }
    }

    private function validateQuantity($request)
    {
        if ($request['quantity'] === '0') {
            $this->Flash->error(__('Você não pode adicionar um item ao carrinho com a quantidade 0.'));
            return false;
        } else {
            return true;
        }
    }

    public function add()
    {
        if ($this->Auth->user() !== null && $this->Roles->get($this->Auth->user()['roles_id'])->role === 'store') {
                $storesCart = $this->StoresCarts->newEntity();

            if ($this->request->is('post')) {
                $storesCart = $this->StoresCarts->patchEntity($storesCart, $this->request->getData());

                if ($this->validateQuantity($this->request->getData())) {
                    if ($this->StoresCarts->save($storesCart)) {
                        return $this->redirect(['controller' => 'homes', 'action' => 'storeCart']);
                    }

                    $this->Flash->error(__('Erro ao adicionar item ao carrinho.'));
                    $this->redirectReferer();
                } else {
                    $this->redirectReferer();
                }
            }


            $this->redirectReferer();
        } else {
            $this->redirectSignup();
        }
    }

    public function edit($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $storesCart = $this->StoresCarts->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $storesCart = $this->StoresCarts->patchEntity($storesCart, $this->request->getData());
                if ($this->StoresCarts->save($storesCart)) {
                    $this->Flash->success(__('The stores cart has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The stores cart could not be saved. Please, try again.'));
            }
            $storesProducts = $this->StoresCarts->StoresProducts->find('list', ['limit' => 200]);
            $users = $this->StoresCarts->Users->find('list', ['limit' => 200]);
            $this->set(compact('storesCart', 'storesProducts', 'users'));
        } else {
            $this->redirectSignup();
        }
    }

    public function delete($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $this->request->allowMethod(['post', 'delete']);
            $storesCart = $this->StoresCarts->get($id);
            if ($this->StoresCarts->delete($storesCart)) {
                $this->Flash->success(__('The stores cart has been deleted.'));
            } else {
                $this->Flash->error(__('The stores cart could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        } else {
            $this->redirectSignup();
        }
    }
}
