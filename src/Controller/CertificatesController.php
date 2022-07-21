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
            'contain' =>
                [
                    'StoresCourses'
                ],
            'conditions' =>
                [
                    'Certificates.users_id =' => $this->Auth->user()['id']
                ]
            ]
        );

        $this->set(compact('certificates'));
    }
}
