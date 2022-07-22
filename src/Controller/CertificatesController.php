<?php

namespace App\Controller;

use App\Controller\AppController;

class CertificatesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['verify']);
    }

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

    public function verify()
    {
        $certificate = $this->Certificates->find(
            'all',
            [
            'conditions' =>
                [
                    'Certificates.code =' => $this->request->getData()['certificate']
                ]
            ]
        );

        $text = '';

        if (empty($certificate->toArray())) {
            $text = 'Código do Certificado Não Encontrado..';
        } else {
            $text = 'Código do Certificado Encontrado..';
        }

        $this->set(compact('text'));
    }
}
