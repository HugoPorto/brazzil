<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Certificates Controller
 *
 * @property \App\Model\Table\CertificatesTable $Certificates
 *
 * @method \App\Model\Entity\Certificate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CertificatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->hasPermission('store');

        $this->viewBuilder()->setLayout('brazzil');

        $certificates = $this->Certificates->find(
            'all',
            [
            'contain' => [
                'StoresCourses'
            ]
            ]
        );

        $this->set(compact('certificates'));
    }

    /**
     * View method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $certificate = $this->Certificates->get($id, [
            'contain' => ['StoresCourses', 'Users']
        ]);

        $this->set('certificate', $certificate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $certificate = $this->Certificates->newEntity();
        if ($this->request->is('post')) {
            $certificate = $this->Certificates->patchEntity($certificate, $this->request->getData());
            if ($this->Certificates->save($certificate)) {
                $this->Flash->success(__('The certificate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The certificate could not be saved. Please, try again.'));
        }
        $storesCourses = $this->Certificates->StoresCourses->find('list', ['limit' => 200]);
        $users = $this->Certificates->Users->find('list', ['limit' => 200]);
        $this->set(compact('certificate', 'storesCourses', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $certificate = $this->Certificates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $certificate = $this->Certificates->patchEntity($certificate, $this->request->getData());
            if ($this->Certificates->save($certificate)) {
                $this->Flash->success(__('The certificate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The certificate could not be saved. Please, try again.'));
        }
        $storesCourses = $this->Certificates->StoresCourses->find('list', ['limit' => 200]);
        $users = $this->Certificates->Users->find('list', ['limit' => 200]);
        $this->set(compact('certificate', 'storesCourses', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $certificate = $this->Certificates->get($id);
        if ($this->Certificates->delete($certificate)) {
            $this->Flash->success(__('The certificate has been deleted.'));
        } else {
            $this->Flash->error(__('The certificate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
