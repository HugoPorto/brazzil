<?php

namespace App\Controller;

use App\Controller\AppController;

class PagesController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $this->clearSession();

        $this->loadModel('Users');
        $this->loadModel('StoresSliders');

        $loginMenu = $this->loginMenuLoad();

        $users = $this->Users->find();
        $users->innerJoinWith('Roles', function ($q) {
            return $q->where(['Roles.role' => 'store']);
        });

        $this->set(compact(
            [
                'loginMenu',
                'users'
            ]
        ));
    }
}
