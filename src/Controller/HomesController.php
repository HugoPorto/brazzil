<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

class HomesController extends AppController
{
    use MailerAwareTrait;

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['site']);
        $this->Auth->allow(['store']);
        $this->Auth->allow(['productView']);
        $this->Auth->allow(['storeCart']);
        $this->Auth->allow(['storeContact']);
        $this->Auth->allow(['addMessage']);
        $this->Auth->allow(['search']);
        $this->Auth->allow(['productView']);
    }

    public function site()
    {
        $this->loadModel('StoresProducts');
        $this->loadModel('StoresSliders');
        $storesSliders = $this->StoresSliders->find('all');

        $this->paginate = [
                'limit' => 16,
                'order' => [
                    'StoresProducts.id' => 'DESC'
                ],
                'conditions' => [
                    'StoresProducts.quantity >' => 0,
                    'StoresProducts.online =' => 1,
                    'StoresProducts.active =' => 1,
                    'StoresProducts.photo !=' => 'Indefinida'
                ]
        ];

        $storesProducts = $this->paginate($this->StoresProducts);

        $this->set(compact(
            [
            'storesProducts',
            'storesSliders'
            ]
        ));
    }

    public function store($idCategory = null)
    {
        if ($idCategory) {
            $this->loadModel('StoresCategories');
            $this->loadModel('StoresProducts');

            $storesCategories = $this->StoresCategories->find(
                'all',
                [
                    'limit' => 20
                ]
            );

            $this->paginate = [
                    'limit' => 6,
                    'order' => [
                        'StoresProducts.id' => 'DESC'
                    ],
                    'conditions' => [
                        'StoresProducts.quantity >' => 0,
                        'StoresProducts.online =' => 1,
                        'StoresProducts.active =' => 1,
                        'StoresProducts.photo !=' => 'Indefinida',
                        'StoresProducts.stores_categories_id =' => $idCategory,
                    ]
            ];


            $storesProducts = $this->paginate($this->StoresProducts);

            $this->set(compact(
                [
                'storesCategories',
                'storesProducts'
                ]
            ));
        } else {
            $this->loadModel('StoresCategories');
            $this->loadModel('StoresProducts');

            $storesCategories = $this->StoresCategories->find(
                'all',
                [
                    'limit' => 20
                ]
            );

            $this->paginate = [
                    'limit' => 6,
                    'order' => [
                        'StoresProducts.id' => 'DESC'
                    ],
                    'conditions' => [
                        'StoresProducts.quantity >' => 0,
                        'StoresProducts.online =' => 1,
                        'StoresProducts.active =' => 1,
                        'StoresProducts.photo !=' => 'Indefinida'
                    ]
            ];


            $storesProducts = $this->paginate($this->StoresProducts);

            $this->set(compact(
                [
                'storesCategories',
                'storesProducts'
                ]
            ));
        }
    }

    public function demands()
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
                $this->loadModel('StoresCategories');
                $this->loadModel('StoresDemands');

                $storesCategories = $this->StoresCategories->find(
                    'all',
                    [
                        'limit' => 20
                    ]
                );

                $this->paginate = [
                        'limit' => 6,
                        'order' => [
                            'StoresDemands.id' => 'DESC'
                        ],
                        'conditions' => [
                            'StoresDemands.users_id =' => $this->Auth->user()['id'],
                        ]
                ];


                $storesDemands = $this->paginate($this->StoresDemands);

                $this->set(compact(
                    [
                    'storesCategories',
                    'storesDemands'
                    ]
                ));
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    public function productView($id = null)
    {
        $this->loadModel('StoresProducts');

        $storesProduct = $this->StoresProducts->get(
            $id,
            [
                'contain' => ['StoresCategories']
            ]
        );

        $idUser = $this->Auth->user()['id'];

        $this->set(compact(
            [
                'storesProduct',
                'idUser'
            ]
        ));
    }

    public function storeCart($shippingValue = null, $cep = null, $prazoEntrega = null)
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
                $session = $this->request->getSession();

                $session->delete('address_demand');

                $this->loadModel('StoresCarts');

                $storesCarts = $this->StoresCarts->find(
                    'all',
                    [
                        'contain' => ['StoresProducts'],
                        'conditions' => [
                            'StoresCarts.users_id =' => $this->Auth->user()['id']
                        ]
                    ]
                );

                if (empty($storesCarts->toArray())) {
                    return $this->redirect(['action' => 'store']);
                }

                $total = 0;

                foreach ($storesCarts as $storesCart) {
                    $total =  $total + (str_replace(",", ".", $storesCart->stores_product->price) * (float) $storesCart->quantity);
                }

                $shippingValue = str_replace(",", ".", $shippingValue);

                if ($shippingValue) {
                    $total = (float) $total + (float) $shippingValue;
                }

                if ($cep) {
                    $this->set(compact(
                        [
                            'storesCarts',
                            'total',
                            'cep',
                            'prazoEntrega'
                        ]
                    ));
                } else {
                    $this->set(compact(
                        [
                            'storesCarts',
                            'total',
                            'cep',
                            'prazoEntrega',
                        ]
                    ));
                }
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    public function storeRemoveItemCart($id = null)
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
                $this->loadModel('StoresCarts');

                $this->request->allowMethod(['post', 'delete']);

                $storesCart = $this->StoresCarts->get($id);

                $this->StoresCarts->delete($storesCart);

                $session = $this->request->getSession();

                $session->delete('Flash');

                return $this->redirect(['controller' => 'homes', 'action' => 'storeCart']);
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    public function storeCheckout()
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
                $this->loadModel('StoresCarts');

                $storesCarts = $this->StoresCarts->find(
                    'all',
                    [
                        'contain' => ['StoresProducts'],
                        'conditions' => [
                            'StoresCarts.users_id =' => $this->Auth->user()['id']
                        ]
                    ]
                );

                if (empty($storesCarts->toArray())) {
                    return $this->redirect(['action' => 'store']);
                }

                $total = 0;


                foreach ($storesCarts as $storesCart) {
                    $total = $total + ($storesCart->stores_product->price * $storesCart->quantity);
                }


                $this->set(compact('storesCarts', 'total'));
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    public function storeConfirm($demandId = null)
    {
        if ($this->Auth->user() !== null && $this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
            $this->set('demandId', $demandId);
        } else {
            $this->redirectSignup();
        }
    }

    public function calculateShipping()
    {
        if ($this->Auth->user() !== null && $this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
            $cep = $this->request->getData()['cep'];
            $calculateShipping = $this->calculateShippingMain($cep);

            if ($calculateShipping === 'Error') {
                $this->Flash->error(__('Erro ao calcular frete.'));
                $this->redirect(['controller' => 'homes', 'action' => 'storeCart']);
            }
        } else {
            $this->redirectSignup();
        }
    }

    public function search()
    {
        $this->loadModel('StoresCategories');
        $this->loadModel('StoresProducts');

        $storesCategories = $this->StoresCategories->find(
            'all',
            [
                'limit' => 20
            ]
        );

        $this->paginate = [
                'limit' => 6,
                'order' => [
                    'StoresProducts.id' => 'DESC'
                ],
                'conditions' => [
                    'StoresProducts.quantity >' => 0,
                    'StoresProducts.online =' => 1,
                    'StoresProducts.active =' => 1,
                    'StoresProducts.product LIKE' => $this->request->query['search'] . '%',
                ]
        ];


        $storesProducts = $this->paginate($this->StoresProducts);

        $this->set(compact(
            [
            'storesCategories',
            'storesProducts'
            ]
        ));
    }

    public function storeContact($sended = null)
    {

        if ($sended) {
            $this->set(compact(
                [
                    'sended',
                ]
            ));
        }
    }

    public function addMessage()
    {
        $this->loadModel('StoresMessages');

        $storesMessage = $this->StoresMessages->newEntity();

        if ($this->request->is('post')) {
            $storesMessage = $this->StoresMessages->patchEntity($storesMessage, $this->request->getData());
            if ($this->StoresMessages->save($storesMessage)) {
                $sended = true;

                return $this->redirect(['controller' => 'homes', 'action' => 'storeContact', $sended]);
            }
        }
    }
}
