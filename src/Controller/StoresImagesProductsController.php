<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresImagesProducts Controller
 *
 * @property \App\Model\Table\StoresImagesProductsTable $StoresImagesProducts
 *
 * @method \App\Model\Entity\StoresImagesProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresImagesProductsController extends AppController
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
        $storesImagesProducts = $this->paginate($this->StoresImagesProducts);

        $this->set(compact('storesImagesProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Images Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storesImagesProduct = $this->StoresImagesProducts->get($id, [
            'contain' => ['StoresProducts']
        ]);

        $this->set('storesImagesProduct', $storesImagesProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storesImagesProduct = $this->StoresImagesProducts->newEntity();
        if ($this->request->is('post')) {
            $storesImagesProduct = $this->StoresImagesProducts->patchEntity($storesImagesProduct, $this->request->getData());
            if ($this->StoresImagesProducts->save($storesImagesProduct)) {
                $this->Flash->success(__('The stores images product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores images product could not be saved. Please, try again.'));
        }
        $storesProducts = $this->StoresImagesProducts->StoresProducts->find('list', ['limit' => 200]);
        $this->set(compact('storesImagesProduct', 'storesProducts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Images Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storesImagesProduct = $this->StoresImagesProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesImagesProduct = $this->StoresImagesProducts->patchEntity($storesImagesProduct, $this->request->getData());
            if ($this->StoresImagesProducts->save($storesImagesProduct)) {
                $this->Flash->success(__('The stores images product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores images product could not be saved. Please, try again.'));
        }
        $storesProducts = $this->StoresImagesProducts->StoresProducts->find('list', ['limit' => 200]);
        $this->set(compact('storesImagesProduct', 'storesProducts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Images Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesImagesProduct = $this->StoresImagesProducts->get($id);
        if ($this->StoresImagesProducts->delete($storesImagesProduct)) {
            $this->Flash->success(__('The stores images product has been deleted.'));
        } else {
            $this->Flash->error(__('The stores images product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
