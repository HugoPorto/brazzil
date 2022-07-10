<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Companys Controller
 *
 * @property \App\Model\Table\CompanysTable $Companys
 *
 * @method \App\Model\Entity\Company[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompanysController extends AppController
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

        $companys = $this->Companys->find('all', [
            'contain' => ['Users', 'Citys', 'States']
        ]);

        $this->set(compact('companys'));
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $company = $this->Companys->get($id, [
            'contain' => ['Users', 'Citys', 'States']
        ]);

        $this->set('company', $company);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $company = $this->Companys->newEntity();

        if ($this->request->is('post')) {
            $photo = $this->Base64->processMainPhoto($this->request->getData());

            $data = $this->request->getData();

            $data['photo'] = $photo;

            $company = $this->Companys->patchEntity($company, $data);

            if ($this->Companys->save($company)) {
                $this->Flash->success(__('Empresa salva com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(
                ['controller' => 'Pages', 'action' => 'error', base64_encode('Erro ao adicionar empresa. Por favor, tente novamente.')]
            );
        }

        $citys = $this->Companys->Citys->find('all');

        $this->set(compact('company', 'citys'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $company = $this->Companys->get($id, [
            'contain' => ['Citys', 'States']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companys->patchEntity($company, $this->request->getData());
            if ($this->Companys->save($company)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(
                ['controller' => 'Pages', 'action' => 'error', base64_encode('O item não pode ser salvo. Por favor, tente novamente.')]
            );
        }

        $citys = $this->Companys->Citys->find('all');

        $this->set(compact('company', 'citys'));
    }

    public function editPhoto($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $company = $this->Companys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->Base64->processMainPhoto($this->request->getData());

            $data = $this->request->getData();

            $data['photo'] = $photo;

            $company = $this->Companys->patchEntity($company, $data);

            if ($this->Companys->save($company)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(
                ['controller' => 'Pages', 'action' => 'error', base64_encode('O item não pode ser salvo. Por favor, tente novamente.')]
            );
        }

        $this->set(compact('company'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $company = $this->Companys->get($id);

        if ($this->Companys->delete($company)) {
            $this->Flash->success(__('Empresa deletada com sucesso.'));
        } else {
            return $this->redirect(
                ['controller' => 'Pages', 'action' => 'error', base64_encode('A empresa não pode ser apagada. Por favor, tente novamente.')]
            );
        }

        return $this->redirect(['action' => 'index']);
    }

    public function putProduction($id = null)
    {
        $this->autoRender = false;

        $this->hasPermission('storeAdmin');

        $company = $this->Companys->get($id);

        $disableCompanys = $this->Companys->find('all', [
            'conditions' =>
                [
                    'Companys.id !=' => $id
                ]
        ]);

        if ($this->request->is('get')) {
            $data = $this->request->getData();

            $data['active'] = true;

            $company = $this->Companys->patchEntity($company, $data);

            if ($this->Companys->save($company)) {
                if ($company->id) {
                    foreach ($disableCompanys as $key => $disabledCompany) {
                        $data = $disabledCompany->toArray();

                        $data['active'] = false;

                        $disabledCompany = $this->Companys->patchEntity($disabledCompany, $data);

                        if (!$this->Companys->save($disabledCompany)) {
                            return $this->redirect(
                                ['controller' => 'Pages', 'action' => 'error', base64_encode('A compania não pode ser salvo. Por favor, tente novamente.')]
                            );
                        }
                    }
                }

                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(
                ['controller' => 'Pages', 'action' => 'error', base64_encode('A compania não pode ser salvo. Por favor, tente novamente.')]
            );
        }
    }

    public function loadState($idCity)
    {
        $this->autoRender = false;

        $this->hasPermission('storeAdmin');

        $this->loadModel('Citys');
        $this->loadModel('States');

        $city = $this->Citys->get($idCity, [
            'contain' => ['States']
        ]);

        if (empty($city->toArray())) {
            return $this->response->withStatus(404)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'Não foram encontrados registros!']));
        } else {
            return $this->response->withStatus(200)->withType('application/json')
                ->withStringBody(json_encode($city->state->toArray()));
        }
    }
}
