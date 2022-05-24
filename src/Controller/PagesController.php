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
}
