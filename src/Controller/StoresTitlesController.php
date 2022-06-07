<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresTitles Controller
 *
 * @property \App\Model\Table\StoresTitlesTable $StoresTitles
 *
 * @method \App\Model\Entity\StoresTitle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresTitlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesTitles = $this->StoresTitles->find('all');

        $this->set(compact('storesTitles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Title id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesTitle = $this->StoresTitles->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesTitle = $this->StoresTitles->patchEntity($storesTitle, $this->request->getData());

            if ($this->StoresTitles->save($storesTitle)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'Não foi possível editar o título.']);
        }

        $this->set(compact('storesTitle'));
    }
}
