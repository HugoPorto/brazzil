<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresPartners Controller
 *
 * @property \App\Model\Table\StoresPartnersTable $StoresPartners
 *
 * @method \App\Model\Entity\StoresPartner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresPartnersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Base64');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesPartners = $this->StoresPartners->find('all');

        $this->set(compact('storesPartners'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Partner id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $this->hasPermission('storeAdmin');

    //     $this->viewBuilder()->setLayout('brazzil');

    //     $storesPartner = $this->StoresPartners->get($id, [
    //         'contain' => ['Users']
    //     ]);

    //     $this->set('storesPartner', $storesPartner);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesPartner = $this->StoresPartners->newEntity();

        if ($this->request->is('post')) {
            $photo = $this->Base64->processMainPhoto($this->request->getData());

            $data = [];

            $data = $this->request->getData();

            $data['photo'] = $photo;

            $storesPartner = $this->StoresPartners->patchEntity($storesPartner, $data);

            if ($this->StoresPartners->save($storesPartner)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'Erro ao adicionar parceiro.']);
        }

        $this->set(compact('storesPartner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Partner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesPartner = $this->StoresPartners->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->Base64->processMainPhoto($this->request->getData());

            $data = [];

            $data = $this->request->getData();

            $data['photo'] = $photo;

            $storesPartner = $this->StoresPartners->patchEntity($storesPartner, $data);

            if ($this->StoresPartners->save($storesPartner)) {
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('storesPartner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Partner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $this->request->allowMethod(['post', 'delete']);

        $storesPartner = $this->StoresPartners->get($id);

        $this->StoresPartners->delete($storesPartner);

        return $this->redirect(['action' => 'index']);
    }
}
