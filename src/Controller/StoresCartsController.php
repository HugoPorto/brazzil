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
        $this->hasPermission('store');

        $this->paginate = [
            'contain' => ['StoresProducts', 'Users']
        ];
        $storesCarts = $this->paginate($this->StoresCarts);

        $this->set(compact('storesCarts'));
    }

    public function view($id = null)
    {
        $this->hasPermission('store');

        $storesCart = $this->StoresCarts->get($id, [
            'contain' => ['StoresProducts', 'Users']
        ]);

        $this->set('storesCart', $storesCart);
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
        $this->hasPermission('store');

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
    }

    public function delete($id = null)
    {
        $this->hasPermission('store');

        $this->request->allowMethod(['post', 'delete']);

        $storesCart = $this->StoresCarts->get($id);

        if ($this->StoresCarts->delete($storesCart)) {
            $this->Flash->success(__('The stores cart has been deleted.'));
        } else {
            $this->Flash->error(__('The stores cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
