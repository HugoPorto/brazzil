<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresAboutsController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesAbouts = $this->StoresAbouts->find('all');

        $this->set(compact('storesAbouts', 'loginMenu'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesAbout = $this->StoresAbouts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesAbout = $this->StoresAbouts->patchEntity($storesAbout, $this->request->getData());
            if ($this->StoresAbouts->save($storesAbout)) {
                $this->Flash->success(__('The stores about has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores about could not be saved. Please, try again.'));
        }
        $users = $this->StoresAbouts->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesAbout', 'users', 'loginMenu'));
    }
}
