<?php

namespace App\Controller;

use App\Controller\AppController;
use Seld\JsonLint\Undefined;

/**
 * Configs Controller
 *
 * @property \App\Model\Table\ConfigsTable $Configs
 *
 * @method \App\Model\Entity\Config[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConfigsController extends AppController
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
        $configs = $this->paginate($this->Configs);

        $this->set(compact('configs'));
    }

    /**
     * View method
     *
     * @param string|null $id Config id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $config = $this->Configs->find('all', [
            'conditions' => [
                'Configs.users_id =' => $this->Auth->user()['id']
            ]
        ]);

        $this->set('config', $config->toArray()[0]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $config = $this->Configs->newEntity();
        if ($this->request->is('post')) {
            $config = $this->Configs->patchEntity($config, $this->request->getData());
            if ($this->Configs->save($config)) {
                $this->Flash->success(__('The config has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The config could not be saved. Please, try again.'));
        }
        $users = $this->Configs->Users->find('list', ['limit' => 200]);
        $this->set(compact('config', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Config id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $config = $this->Configs->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = [];

            $data = $this->request->getData();

            if (!array_key_exists("status_banner_main", $data)) {
                $data['status_banner_main'] = '0';
            } else {
                $data['status_banner_main'] = '1';
            }

            if (array_key_exists("fisic", $data) && array_key_exists("digital", $data)) {
                // $data['show_type_products'] = '3';
                return $this->redirect(['controller' => 'Pages', 'action' => 'error', base64_encode('Essa configuração ainda não está disponível.')]);
            } elseif (array_key_exists("fisic", $data) && !array_key_exists("digital", $data)) {
                $data['show_type_products'] = '1';
            } elseif (!array_key_exists("fisic", $data) && !array_key_exists("digital", $data)) {
                $data['show_type_products'] = '1';
            } elseif (!array_key_exists("fisic", $data) && array_key_exists("digital", $data)) {
                $data['show_type_products'] = '2';
            }

            $config = $this->Configs->patchEntity($config, $data);

            if ($this->Configs->save($config)) {
                return $this->redirect(['action' => 'view']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', base64_encode('Erro ao editar configuração.')]);
        }

        $this->set(compact('config', 'users'));
    }
}
