<?php

namespace App\Controller;

use App\Controller\AppController;

class IndexSidebarsController extends AppController
{
    public function index()
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $this->paginate = [
                'contain' => ['Roles', 'CategorySidebars', 'Users']
            ];
            $indexSidebars = $this->paginate($this->IndexSidebars);

            $this->set(compact('indexSidebars'));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function view($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $indexSidebar = $this->IndexSidebars->get($id, [
                'contain' => ['Roles', 'CategorySidebars', 'Users']
            ]);

            $this->set('indexSidebar', $indexSidebar);
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function add()
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $indexSidebar = $this->IndexSidebars->newEntity();
            if ($this->request->is('post')) {
                $indexSidebar = $this->IndexSidebars->patchEntity($indexSidebar, $this->request->getData());
                if ($this->IndexSidebars->save($indexSidebar)) {
                    $this->Flash->success(__('The index sidebar has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The index sidebar could not be saved. Please, try again.'));
            }
            $roles = $this->IndexSidebars->Roles->find('list', ['limit' => 200]);
            $categorySidebars = $this->IndexSidebars->CategorySidebars->find('list', ['limit' => 200]);
            $users = $this->IndexSidebars->Users->find('list', ['limit' => 200]);
            $this->set(compact('indexSidebar', 'roles', 'categorySidebars', 'users'));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function edit($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $indexSidebar = $this->IndexSidebars->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $indexSidebar = $this->IndexSidebars->patchEntity($indexSidebar, $this->request->getData());
                if ($this->IndexSidebars->save($indexSidebar)) {
                    $this->Flash->success(__('The index sidebar has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The index sidebar could not be saved. Please, try again.'));
            }
            $roles = $this->IndexSidebars->Roles->find('list', ['limit' => 200]);
            $categorySidebars = $this->IndexSidebars->CategorySidebars->find('list', ['limit' => 200]);
            $users = $this->IndexSidebars->Users->find('list', ['limit' => 200]);
            $this->set(compact('indexSidebar', 'roles', 'categorySidebars', 'users'));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function delete($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $this->request->allowMethod(['post', 'delete']);
            $indexSidebar = $this->IndexSidebars->get($id);
            if ($this->IndexSidebars->delete($indexSidebar)) {
                $this->Flash->success(__('The index sidebar has been deleted.'));
            } else {
                $this->Flash->error(__('The index sidebar could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }
}
