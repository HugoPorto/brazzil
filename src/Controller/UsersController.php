<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;
use Cake\Mailer\MailerAwareTrait;

class UsersController extends AppController
{
    use MailerAwareTrait;

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UploadImageProfile');

        $this->Auth->allow(
            [
                'register',
                'update',
                'signup',
            ]
        );
    }

    public function index()
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $users = $this->Users->find('all', [
                'contain' => ['Roles']
            ]);

            $this->set(compact('users'));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function view($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $user = $this->Users->get($id, [
                'contain' => ['Roles'],
            ]);

            $this->set('user', $user);
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function add()
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $user = $this->Users->newEntity();

            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());

                if ($this->Users->save($user)) {
                    $this->getMailer('User')->send('welcome', [$user]);

                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $roles = $this->Users->Roles->find('list', ['limit' => 200]);
            $this->set(compact('user', 'roles'));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function edit($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData());

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $roles = $this->Users->Roles->find('list', ['limit' => 200]);
            $this->set(compact('user', 'roles'));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function delete($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);

            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('site');

        $this->loadModel('StoresTerms');

        $storesTerms = $this->StoresTerms->find('all')->first();

        if (!$this->Auth->user() && $this->request->is('post')) {
                $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);

                $role = $this->Users->Roles->get($user['roles_id']);

                if ($role->role === 'store') {
                    return $this->redirect(['controller' => 'homes', 'action' => 'store']);
                }

                return $this->redirect(['controller' => 'users', 'action' => 'mainmenu']);
            } else {
                $this->Flash->error(__('Nome de usuário ou password inválido!'));
            }
        }

        $this->set(compact('storesTerms'));
    }

    public function mainmenu()
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'root') {
            return $this->redirect(['controller' => 'Tablesroots', 'action' => 'index']);
        } elseif ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'storeAdmin') {
            $this->clearSession();

            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        } else {
            $this->logout();
        }
    }

    public function logout()
    {
        $session = $this->request->getSession();

        $session->delete('Flash');

        $this->redirect($this->Auth->logout());
    }

    public function register()
    {
        if (!$this->Auth->user()) {
            $user = $this->Users->newEntity();

            if ($this->request->is('post')) {
                if (!isset($this->request->getData()['terms'])) {
                    $this->Flash->error(__('Você não aceitou os termos de uso. Você precisa aceitar para prosseguir!'));
                } else {
                    $user = $this->Users->patchEntity($user, $this->request->getData());

                    if ($this->Users->save($user)) {
                        $this->getMailer('User')->send('welcome', [$user]);

                        $role = $this->Users->Roles->get($this->request->getData()['roles_id']);

                        if ($role->role === 'store') {
                            $this->Flash->success(__('Usuário cadastrado com sucesso!'));
                        } else {
                            return $this->redirect(['action' => 'index']);
                        }
                    }
                }
            }

            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function profile($userName = null)
    {
        if ($this->Auth->user() !== null && $this->Roles->get($this->Auth->user()['roles_id'])->role == 'storeAdmin') {
                $this->viewBuilder()->setLayout('brazzil');

                $this->loadModel('Abouts');


                $loginMenu = $this->loginMenuLoad();

                $_user = $this->Users->find('all', [
                    'conditions' => [
                        'Users.id' => $this->Auth->user()['id']
                    ]
                ])->select(
                    [
                        'name',
                        'username',
                        'lastname',
                        'email',
                        'cellphone'
                    ]
                )->first();

                $this->set(compact(
                    [
                        'loginMenu',
                        '_user'
                    ]
                ));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function editcommon($id = null)
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'storeAdmin') {
                $this->viewBuilder()->setLayout('brazzil');

                $this->loadModel('Betas');

                $this->loadModel('Abouts');

                $loginMenu = $this->loginMenuLoad();

                $betaCoins = $this->Betas->findByDescription('Coins')->first()->beta;

                $betaTable = $this->Betas->findByDescription('BetaTable')->first()->beta;

                $betaFooter = $this->Betas->findByDescription('Footer')->first()->beta;

                $user = $this->Users->get($this->Auth->user()['id'], [
                    'contain' => [],
                ]);

                $about = $this->Abouts->find('all', [
                    'conditions' => [
                        'Abouts.users_id' => $this->Auth->user()['id']
                    ],
                ])->first();

                if ($this->request->is(['patch', 'post', 'put'])) {
                    $user = $this->Users->patchEntity($user, $this->request->getData());

                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The user has been saved.'));

                        return $this->redirect(['action' => 'profile']);
                    }

                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }

                $roles = $this->Users->Roles->find('list', ['limit' => 200]);

                $this->set(compact(
                    [
                        'user',
                        'roles',
                        'loginMenu',
                        'betaCoins',
                        'betaTable',
                        'betaFooter',
                        'about'
                    ]
                ));
            } else {
                return $this->redirect(['controller' => 'pages', 'action' => 'index']);
            }
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function editaboutscommon($id = null)
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'common') {
                $this->viewBuilder()->setLayout('brazzil');

                $this->loadModel('Betas');

                $this->loadModel('Abouts');

                $loginMenu = $this->loginMenuLoad();

                $betaCoins = $this->Betas->findByDescription('Coins')->first()->beta;

                $betaTable = $this->Betas->findByDescription('BetaTable')->first()->beta;

                $betaFooter = $this->Betas->findByDescription('Footer')->first()->beta;

                $about = $this->Abouts->find('all', [
                    'conditions' => [
                        'Abouts.users_id' => $this->Auth->user()['id']
                    ],
                ])->first();

                if ($this->request->is(['patch', 'post', 'put'])) {
                    $about = $this->Abouts->patchEntity($about, $this->request->getData());
                    if ($this->Abouts->save($about)) {
                        $this->Flash->success(__('The about has been saved.'));

                        return $this->redirect(['action' => 'profile']);
                    }
                    $this->Flash->error(__('The about could not be saved. Please, try again.'));
                }

                $users = $this->Abouts->Users->find('list', ['limit' => 200]);
            } else {
                return $this->redirect(['controller' => 'pages', 'action' => 'index']);
            }
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function deletecommon($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'common') {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);

            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
                $this->Auth->logout();
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function updatePhoto()
    {
        if ($this->Auth->user() !== null && $this->Roles->get($this->Auth->user()['roles_id'])->role == 'storeAdmin') {
                $this->viewBuilder()->setLayout('brazzil');

                $this->loadModel('ImageProfiles');

                $imageProfile = $this->ImageProfiles->newEntity();

                $loginMenu = $this->loginMenuLoad();

                $error = false;

            if ($this->request->is('post')) {
                $user = $this->Users->findByUsername($this->Auth->user('username'))->firstOrFail();

                if ($this->request->data['image'][0]['tmp_name'] !== '') {
                    if ($this->ImageProfiles->find('all')->where(['ImageProfiles.users_id =' => $user->id])->first() != null) {
                        $imageProfile = $this->ImageProfiles->find('all')->where(['ImageProfiles.users_id =' => $user->id])->firstOrFail();

                        $this->deletePhoto($imageProfile);
                    }

                    $this->UploadImageProfile->upload($this->request->data['image'], $this->request->data['galerys_id'], $this->request->data['users_id']);
                } else {
                    $this->Flash->error(__('You need to select an image.'));

                    $error = true;

                    $this->set(compact('imageProfile', 'galerys', 'user', 'loginMenu', 'error'));
                }
            }

                $galerys = $this->ImageProfiles->Galerys->find('list', ['limit' => 200]);

                $user = $this->Users->findByUsername($this->Auth->user('username'))->firstOrFail();

                $this->set(compact('imageProfile', 'galerys', 'user', 'loginMenu', 'error'));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function deletePhoto($imageProfile = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $galery = $imageProfile->galerys_id;
        $filename = $imageProfile->image;
        $dir = WWW_ROOT . 'img' . DS . 'galerys' . DS . $galery . DS . $filename;

        if ($this->ImageProfiles->delete($imageProfile)) {
            $file = new File($dir);
            $file->delete();
            $file->close();
        }
    }

    public function updatePassword($id = null)
    {
        if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'common') {
            $this->viewBuilder()->setLayout('adminlte_videos');
            $this->loadModel('CategoryVideos');
            $this->loadModel('Publicitys');
            $this->loadModel('Footers');
            $footers = $this->Footers->find('all')->first();
            $categoryVideos = $this->CategoryVideos->find('all');

            $user = $this->Users->get($id, [
                'contain' => [],
            ]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData());

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $roles = $this->Users->Roles->find('list', ['limit' => 200]);
            $this->set(compact('user', 'roles', 'footers', 'categoryVideos'));
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }

    public function cpf()
    {
        $this->hasPermission('store');

        $this->viewBuilder()->setLayout('site');
    }

    public function setCpfNoDigital()
    {
        $this->autoRender = false;

        $session = $this->request->getSession();

        $session->write('cpf', $this->request->getData()['cpf']);

        $this->redirect(['controller' => 'stripes', 'action' => 'stripe']);
    }
}
