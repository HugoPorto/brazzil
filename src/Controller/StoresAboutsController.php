<?php
namespace App\Controller;

use App\Controller\AppController;

class StoresAboutsController extends AppController
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
                $storesAbouts = $this->paginate($this->StoresAbouts);

                $this->set(compact('storesAbouts'));
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
                $storesAbout = $this->StoresAbouts->get($id, [
                    'contain' => ['Users']
                ]);

                $this->set('storesAbout', $storesAbout);
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
                $this->set(compact('storesAbout', 'users'));
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
