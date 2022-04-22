<?php
namespace App\Controller;

use App\Controller\AppController;

class StoresHoursController extends AppController
{
    public function index()
    {
        if($this->Auth->user() !== null)
        {
            if($this->Roles->get($this->Auth->user()['roles_id'])->role === 'storeAdmin')
            {
                $this->paginate = [
                    'contain' => ['Users']
                ];
                $storesHours = $this->paginate($this->StoresHours);

                $this->set(compact('storesHours'));
            }
            else
            {
                $this->redirectSignup();
            }
        }
        else
        {
            $this->redirectSignup();
        }
    }

    public function view($id = null)
    {
        if($this->Auth->user() !== null)
        {
            if($this->Roles->get($this->Auth->user()['roles_id'])->role === 'storeAdmin')
            {
                $storesHour = $this->StoresHours->get($id, [
                    'contain' => ['Users']
                ]);

                $this->set('storesHour', $storesHour);
            }
            else
            {
                $this->redirectSignup();
            }
        }
        else
        {
            $this->redirectSignup();
        }
    }

    public function edit($id = null)
    {
        if($this->Auth->user() !== null)
        {
            if($this->Roles->get($this->Auth->user()['roles_id'])->role === 'storeAdmin')
            {
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
                $users = $this->StoresHours->Users->find('list', ['limit' => 200]);
                $this->set(compact('storesHour', 'users'));
            }
            else
            {
                $this->redirectSignup();
            }
        }
        else
        {
            $this->redirectSignup();
        }
    }
}
