<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MercadoPago Controller
 *
 * @property \App\Model\Table\MercadoPagoTable $MercadoPago
 *
 * @method \App\Model\Entity\MercadoPago[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MercadoPagoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $mercadoPago = $this->paginate($this->MercadoPago);

        $this->set(compact('mercadoPago'));
    }

    /**
     * View method
     *
     * @param string|null $id Mercado Pago id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mercadoPago = $this->MercadoPago->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('mercadoPago', $mercadoPago);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mercadoPago = $this->MercadoPago->newEntity();
        if ($this->request->is('post')) {
            $mercadoPago = $this->MercadoPago->patchEntity($mercadoPago, $this->request->getData());
            if ($this->MercadoPago->save($mercadoPago)) {
                $this->Flash->success(__('The mercado pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mercado pago could not be saved. Please, try again.'));
        }
        $users = $this->MercadoPago->Users->find('list', ['limit' => 200]);
        $this->set(compact('mercadoPago', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mercado Pago id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mercadoPago = $this->MercadoPago->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mercadoPago = $this->MercadoPago->patchEntity($mercadoPago, $this->request->getData());
            if ($this->MercadoPago->save($mercadoPago)) {
                $this->Flash->success(__('The mercado pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mercado pago could not be saved. Please, try again.'));
        }
        $users = $this->MercadoPago->Users->find('list', ['limit' => 200]);
        $this->set(compact('mercadoPago', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mercado Pago id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mercadoPago = $this->MercadoPago->get($id);
        if ($this->MercadoPago->delete($mercadoPago)) {
            $this->Flash->success(__('The mercado pago has been deleted.'));
        } else {
            $this->Flash->error(__('The mercado pago could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
