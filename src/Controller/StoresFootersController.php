<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresFootersController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $this->paginate = [
            'contain' => ['Users']
        ];
        $storesFooters = $this->paginate($this->StoresFooters);

        $this->set(compact('storesFooters', 'loginMenu'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesFooter = $this->StoresFooters->get($id, [
            'contain' => ['Users']
        ]);

        $this->set(compact('storesFooter', 'loginMenu'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

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
        $this->set(compact('storesFooter', 'loginMenu'));
    }
}
