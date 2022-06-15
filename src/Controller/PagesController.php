<?php

namespace App\Controller;

use App\Controller\AppController;

class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Base64');
    }

    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $this->clearSession();

        $this->loadModel('Users');
        $this->loadModel('StoresSliders');

        $users = $this->Users->find();
        $users->innerJoinWith('Roles', function ($q) {
            return $q->where(['Roles.role' => 'store']);
        });

        $this->set(compact(
            [
                'users'
            ]
        ));
    }

    public function error($message)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $this->set('message', $message);
    }

    public function editPromotionBanner()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $this->loadModel('Homes');

        $home = $this->Homes->find('all')->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->Base64->processBannerPromotion($this->request->getData());

            $data = [];

            $data = $this->request->getData();

            $data['banner'] = $photo;

            $home = $this->Homes->patchEntity($home, $data);

            if ($this->Homes->save($home)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'Erro ao adicionar banner.']);
        }

        $this->set(compact('home'));
    }
}
