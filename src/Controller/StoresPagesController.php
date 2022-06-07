<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresPages Controller
 *
 * @property \App\Model\Table\StoresPagesTable $StoresPages
 *
 * @method \App\Model\Entity\StoresPage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresPagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $storesPages = $this->paginate($this->StoresPages);

        $this->set(compact('storesPages'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Page id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storesPage = $this->StoresPages->get($id, [
            'contain' => []
        ]);

        $this->set('storesPage', $storesPage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storesPage = $this->StoresPages->newEntity();
        if ($this->request->is('post')) {
            $storesPage = $this->StoresPages->patchEntity($storesPage, $this->request->getData());
            if ($this->StoresPages->save($storesPage)) {
                $this->Flash->success(__('The stores page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores page could not be saved. Please, try again.'));
        }
        $this->set(compact('storesPage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Page id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storesPage = $this->StoresPages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesPage = $this->StoresPages->patchEntity($storesPage, $this->request->getData());
            if ($this->StoresPages->save($storesPage)) {
                $this->Flash->success(__('The stores page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores page could not be saved. Please, try again.'));
        }
        $this->set(compact('storesPage'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesPage = $this->StoresPages->get($id);
        if ($this->StoresPages->delete($storesPage)) {
            $this->Flash->success(__('The stores page has been deleted.'));
        } else {
            $this->Flash->error(__('The stores page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
