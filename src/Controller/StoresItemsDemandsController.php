<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresItemsDemandsController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $this->paginate = [
        'contain' => ['StoresDemands', 'StoresProducts', 'StoresCourses']
        ];
        $storesItemsDemands = $this->paginate($this->StoresItemsDemands);

        $this->set(compact('storesItemsDemands', 'loginMenu'));
    }

    // public function view($id = null)
    // {
    //     $this->hasPermission('storeAdmin');

    //     $this->viewBuilder()->setLayout('brazzil');

    //     $loginMenu = $this->loginMenuLoad();

    //     $storesItemsDemand = $this->StoresItemsDemands->get($id, [
    //     'contain' => ['StoresDemands', 'StoresProducts']
    //     ]);

    //     $this->set(compact('storesItemsDemand', 'loginMenu'));
    // }

    public function getItemByDemandId($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        // Exemplo
        // $query = $articles->find()->contain([
        //     'Comments' => function ($q) {
        //        return $q
        //             ->select(['body', 'author_id'])
        //             ->where(['Comments.approved' => true]);
        //     }
        // ]);

        $storesItemsDemands = $this->StoresItemsDemands->find('all', [
        'conditions' => [
            'StoresItemsDemands.stores_demands_id =' => $id
        ]
        ])->contain([
        'StoresProducts' => function ($q) {
            return $q->select(['id', 'product']);
        },
        'StoresCourses' => function ($q) {
            return $q->select(['id', 'course']);
        },
        'StoresDemands' => function ($q) {
            return $q->select(['id']);
        }
        ]);

            $this->set(compact('storesItemsDemands', 'loginMenu'));
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesItemsDemand = $this->StoresItemsDemands->newEntity();
        if ($this->request->is('post')) {
            $storesItemsDemand = $this->StoresItemsDemands->patchEntity($storesItemsDemand, $this->request->getData());
            if ($this->StoresItemsDemands->save($storesItemsDemand)) {
                $this->Flash->success(__('The stores items demand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores items demand could not be saved. Please, try again.'));
        }
        $storesDemands = $this->StoresItemsDemands->StoresDemands->find('list', ['limit' => 200]);
        $storesProducts = $this->StoresItemsDemands->StoresProducts->find('list', ['limit' => 200]);
        $this->set(compact('storesItemsDemand', 'storesDemands', 'storesProducts', 'loginMenu'));
    }

    // public function edit($id = null)
    // {
    //     $this->hasPermission('storeAdmin');

    //     $this->viewBuilder()->setLayout('brazzil');

    //     $loginMenu = $this->loginMenuLoad();

    //     $storesItemsDemand = $this->StoresItemsDemands->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $storesItemsDemand = $this->StoresItemsDemands->patchEntity($storesItemsDemand, $this->request->getData());
    //         if ($this->StoresItemsDemands->save($storesItemsDemand)) {
    //             $this->Flash->success(__('The stores items demand has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The stores items demand could not be saved. Please, try again.'));
    //     }
    //     $storesDemands = $this->StoresItemsDemands->StoresDemands->find('list', ['limit' => 200]);
    //     $storesProducts = $this->StoresItemsDemands->StoresProducts->find('list', ['limit' => 200]);
    //     $this->set(compact('storesItemsDemand', 'storesDemands', 'storesProducts', 'loginMenu'));
    // }

    // public function delete($id = null)
    // {
    //     $this->hasPermission('storeAdmin');

    //     $this->request->allowMethod(['post', 'delete']);
    //     $storesItemsDemand = $this->StoresItemsDemands->get($id);
    //     if ($this->StoresItemsDemands->delete($storesItemsDemand)) {
    //         $this->Flash->success(__('The stores items demand has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The stores items demand could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
