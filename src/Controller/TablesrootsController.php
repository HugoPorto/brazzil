<?php

namespace App\Controller;

use App\Controller\AppController;

class TablesrootsController extends AppController
{
    public function index()
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $tablesroots = $this->Tablesroots->find('all');

            $this->set(compact('tablesroots'));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function view($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $tablesroot = $this->Tablesroots->get($id, [
                'contain' => [],
            ]);

            $this->set('tablesroot', $tablesroot);
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function add()
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $tablesroot = $this->Tablesroots->newEntity();
            if ($this->request->is('post')) {
                $tablesroot = $this->Tablesroots->patchEntity($tablesroot, $this->request->getData());
                if ($this->Tablesroots->save($tablesroot)) {
                    $this->Flash->success(__('The tablesroot has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The tablesroot could not be saved. Please, try again.'));
            }
            $this->set(compact('tablesroot'));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function edit($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $tablesroot = $this->Tablesroots->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $tablesroot = $this->Tablesroots->patchEntity($tablesroot, $this->request->getData());
                if ($this->Tablesroots->save($tablesroot)) {
                    $this->Flash->success(__('The tablesroot has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The tablesroot could not be saved. Please, try again.'));
            }
            $this->set(compact('tablesroot'));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function delete($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $this->request->allowMethod(['post', 'delete']);
            $tablesroot = $this->Tablesroots->get($id);
            if ($this->Tablesroots->delete($tablesroot)) {
                $this->Flash->success(__('The tablesroot has been deleted.'));
            } else {
                $this->Flash->error(__('The tablesroot could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }
}
