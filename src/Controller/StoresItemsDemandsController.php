<?php
namespace App\Controller;

use App\Controller\AppController;

class StoresItemsDemandsController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['StoresDemands', 'StoresProducts']
        ];
        $storesItemsDemands = $this->paginate($this->StoresItemsDemands);

        $this->set(compact('storesItemsDemands'));
    }

    public function view($id = null)
    {
        $storesItemsDemand = $this->StoresItemsDemands->get($id, [
            'contain' => ['StoresDemands', 'StoresProducts']
        ]);

        $this->set('storesItemsDemand', $storesItemsDemand);
    }

    public function add()
    {
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
        $this->set(compact('storesItemsDemand', 'storesDemands', 'storesProducts'));
    }

    public function edit($id = null)
    {
        $storesItemsDemand = $this->StoresItemsDemands->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesItemsDemand = $this->StoresItemsDemands->patchEntity($storesItemsDemand, $this->request->getData());
            if ($this->StoresItemsDemands->save($storesItemsDemand)) {
                $this->Flash->success(__('The stores items demand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores items demand could not be saved. Please, try again.'));
        }
        $storesDemands = $this->StoresItemsDemands->StoresDemands->find('list', ['limit' => 200]);
        $storesProducts = $this->StoresItemsDemands->StoresProducts->find('list', ['limit' => 200]);
        $this->set(compact('storesItemsDemand', 'storesDemands', 'storesProducts'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesItemsDemand = $this->StoresItemsDemands->get($id);
        if ($this->StoresItemsDemands->delete($storesItemsDemand)) {
            $this->Flash->success(__('The stores items demand has been deleted.'));
        } else {
            $this->Flash->error(__('The stores items demand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
