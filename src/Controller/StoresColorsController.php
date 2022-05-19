<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresColors Controller
 *
 * @property \App\Model\Table\StoresColorsTable $StoresColors
 *
 * @method \App\Model\Entity\StoresColor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresColorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['StoresProducts']
        ];
        $storesColors = $this->paginate($this->StoresColors);

        $this->set(compact('storesColors'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Color id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storesColor = $this->StoresColors->get($id, [
            'contain' => ['StoresProducts']
        ]);

        $this->set('storesColor', $storesColor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storesColor = $this->StoresColors->newEntity();

        if ($this->request->is('post')) {
            $storesColor = $this->StoresColors->patchEntity($storesColor, $this->request->getData());
            if ($this->StoresColors->save($storesColor)) {
                $this->Flash->success(__('The stores color has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores color could not be saved. Please, try again.'));
        }
        $storesProducts = $this->StoresColors->StoresProducts->find('list', ['limit' => 200]);
        $this->set(compact('storesColor', 'storesProducts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Color id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storesColor = $this->StoresColors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesColor = $this->StoresColors->patchEntity($storesColor, $this->request->getData());
            if ($this->StoresColors->save($storesColor)) {
                $this->Flash->success(__('The stores color has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores color could not be saved. Please, try again.'));
        }
        $storesProducts = $this->StoresColors->StoresProducts->find('list', ['limit' => 200]);
        $this->set(compact('storesColor', 'storesProducts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Color id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesColor = $this->StoresColors->get($id);
        if ($this->StoresColors->delete($storesColor)) {
            $this->Flash->success(__('The stores color has been deleted.'));
        } else {
            $this->Flash->error(__('The stores color could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
