<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresHoursController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $loginMenu = $this->loginMenuLoad();

        $storesHours = $this->StoresHours->find('all');

        $this->set(compact('storesHours', 'loginMenu'));
    }

    // public function view($id = null)
    // {
    //     if ($this->Auth->user() !== null) {
    //         if ($this->Roles->get($this->Auth->user()['roles_id'])->role === 'storeAdmin') {
    //             $storesHour = $this->StoresHours->get($id, [
    //                 'contain' => ['Users']
    //             ]);

    //             $this->set('storesHour', $storesHour);
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

        $storesHour = $this->StoresHours->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesHour = $this->StoresHours->patchEntity($storesHour, $this->request->getData());
            if ($this->StoresHours->save($storesHour)) {
                $this->Flash->success(__('The stores hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores hour could not be saved. Please, try again.'));
        }

        $this->set(compact('storesHour', 'users', 'loginMenu'));
    }
}
