<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class StoresCardsController extends AppController
{
    public function index()
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $this->paginate = [
                'contain' => ['Users']
            ];
            $storesCards = $this->paginate($this->StoresCards);

            $this->set(compact('storesCards'));
        } else {
            return $this->redirect(['controller' => 'homes', 'action' => 'signup']);
        }
    }

    public function view($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $storesCard = $this->StoresCards->get($id, [
                'contain' => ['Users']
            ]);

            $this->set('storesCard', $storesCard);
        } else {
            return $this->redirect(['controller' => 'homes', 'action' => 'signup']);
        }
    }

    public function add()
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
                $storesCard = $this->StoresCards->newEntity();

                if ($this->request->is('post')) {
                    $storesCard = $this->StoresCards->patchEntity($storesCard, $this->request->getData());

                    if ($this->StoresCards->save($storesCard)) {
                        // Save Demand
                        $demandId = $this->saveDemand($storesCard->id);

                        // Save intens demands
                        $this->saveItensDemands($demandId);

                        // Clean Cart
                        $this->cleanCart();

                        return $this->redirect(['controller' => 'homes', 'action' => 'storeCheckout']);
                    }

                    return $this->redirect(['controller' => 'homes', 'action' => 'storeCheckout']);
                }
            } else {
                return $this->redirect(['controller' => 'users', 'action' => 'signup']);
            }
        } else {
            return $this->redirect(['controller' => 'users', 'action' => 'signup']);
        }
    }

    private function saveItensDemands($demandId = null)
    {
        $this->loadModel('StoresCarts');
        $this->loadModel('StoresItemsDemands');

        $storesCarts = $this->StoresCarts->find(
            'all',
            [
            'contain' => ['StoresProducts'],
            'conditions' => [
                'StoresCarts.users_id =' => $this->Auth->user()['id']
            ]
            ]
        );

        $itensDemand = [];

        foreach ($storesCarts as $storesCart) {
            $itensDemand = [
                'stores_demands_id' => $demandId,
                'stores_products_id' => $storesCart->stores_products_id,
                'quantity' => $storesCart->quantity
            ];

            $storesItemsDemand = $this->StoresItemsDemands->newEntity();

            $storesItemsDemand = $this->StoresItemsDemands->patchEntity($storesItemsDemand, $itensDemand);

            $this->StoresItemsDemands->save($storesItemsDemand);
        }
    }

    private function saveDemand($storesCardId = null)
    {
        $demand = [
            'users_id' => $this->Auth->user()['id'],
            'stores_cards_id' => $storesCardId
        ];

        $this->loadModel('StoresDemands');

        $storesDemand = $this->StoresDemands->newEntity();

        $storesDemand = $this->StoresDemands->patchEntity($storesDemand, $demand);

        $this->StoresDemands->save($storesDemand);

        return $storesDemand->id;
    }

    private function cleanCart()
    {
        $this->loadModel('StoresCarts');

        $this->StoresCarts->deleteAll(['id >' => 0]);
    }

    public function edit($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $storesCard = $this->StoresCards->get($id, [
                'contain' => []
            ]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $storesCard = $this->StoresCards->patchEntity($storesCard, $this->request->getData());

                if ($this->StoresCards->save($storesCard)) {
                    $this->Flash->success(__('The stores card has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('The stores card could not be saved. Please, try again.'));
            }

            $users = $this->StoresCards->Users->find('list', ['limit' => 200]);

            $this->set(compact('storesCard', 'users'));
        } else {
            return $this->redirect(['controller' => 'homes', 'action' => 'signup']);
        }
    }

    public function delete($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $this->request->allowMethod(['post', 'delete']);

            $storesCard = $this->StoresCards->get($id);

            if ($this->StoresCards->delete($storesCard)) {
                $this->Flash->success(__('The stores card has been deleted.'));
            } else {
                $this->Flash->error(__('The stores card could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        } else {
            return $this->redirect(['controller' => 'homes', 'action' => 'signup']);
        }
    }
}
