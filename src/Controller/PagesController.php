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

        $this->removePessoalDataSession();

        $this->loadModel('Users');

        $this->loadModel('StoresSliders');

        $this->loadModel('StoresDemands');

        $this->loadModel('Companys');

        $users = $this->Users->find();

        $users->innerJoinWith('Roles', function ($q) {
            return $q->where(['Roles.role' => 'store']);
        });

        $usersRoot = $this->Users->find();

        $usersRoot->innerJoinWith('Roles', function ($q) {
            return $q->where(['Roles.role' => 'root']);
        });

        $usersAdmin = $this->Users->find();

        $usersAdmin->innerJoinWith('Roles', function ($q) {
            return $q->where(['Roles.role' => 'storeAdmin']);
        });

        $storesDemands = $this->StoresDemands->find('all', [
            'conditions' => [
                'StoresDemands.status =' => false
            ]
            ]);

        $companys = $this->Companys->find('all', [
            'conditions' => [
                'Companys.active =' => true
            ]
        ])->first();

        $this->set(
            [
                'users' => $users,
                'usersRoot' => $usersRoot,
                'usersAdmin' => $usersAdmin,
                'storesDemands' => $storesDemands,
                'company' => $companys != null && $companys == true ? true : false
            ]
        );
    }

    public function error($message)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $this->set('message', base64_decode($message));
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
