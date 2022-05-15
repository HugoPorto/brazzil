<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;

class GalerysController extends AppController
{
    public function index()
    {
        $galerys = $this->paginate($this->Galerys);

        $this->set(compact('galerys'));
    }

    public function view($id = null)
    {
        $galery = $this->Galerys->get($id, [
            'contain' => ['Images']
        ]);

        $this->set('galery', $galery);
    }


    public function add()
    {
        $galery = $this->Galerys->newEntity();
        if ($this->request->is('post')) {
            $galery = $this->Galerys->patchEntity($galery, $this->request->getData());

            if ($this->Galerys->save($galery)) {
                $this->Flash->success(__('The galery has been saved.'));

                $reg = $this->Galerys->findByTitle($galery->title)->toArray();

                $path = WWW_ROOT . DS . 'img' . DS . 'galerys' . DS . $reg[0]['id'];

                $dir = new Folder();

                if ($dir->create($path, true, 0755)) {
                    $this->Flash->success('A galeria foi criada com sucesso...');
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The galery could not be saved. Please, try again.'));
        }
        $this->set(compact('galery'));
    }


    public function edit($id = null)
    {
        $galery = $this->Galerys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $galery = $this->Galerys->patchEntity($galery, $this->request->getData());
            if ($this->Galerys->save($galery)) {
                $this->Flash->success(__('The galery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The galery could not be saved. Please, try again.'));
        }
        $this->set(compact('galery'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $galery = $this->Galerys->get($id);

        $path = WWW_ROOT . DS . 'img' . DS . 'galerys' . DS . $galery->id;

        if ($this->Galerys->delete($galery)) {
            $this->Flash->success(__('The galery has been deleted.'));

            if (is_dir($path)) {
                $dir = new Folder($path);
                if ($dir->delete()) {
                    $this->Flash->success('Pasta' . $galery->title . 'excluída com sucesso!');
                } else {
                    $this->Flash->error('Não foi possível excluir a pasta' . $galery->title . '!');
                }
            }
        } else {
            $this->Flash->error(__('The galery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
