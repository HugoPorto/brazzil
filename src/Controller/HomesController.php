<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use Cake\Datasource\ConnectionManager;

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
    }

    public function site()
    {
        $this->viewBuilder()->setLayout('site');

        $this->loadModel('StoresSliders');

        $this->loadModel('StoresPartners');

        $this->loadModel('Configs');

        $storesSliders = $this->StoresSliders->find('all');

        $storesPartners = $this->StoresPartners->find('all');

        $configs = $this->Configs->find('all');

        $configs = $configs->toArray();

        if ($configs[0]['show_type_products'] === 1) {
            $this->loadModel('StoresProducts');

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
                'storesSliders',
                'storesPartners',
                ]
            ));
        } elseif ($configs[0]['show_type_products'] === 2) {
            $this->loadModel('StoresCourses');

            $this->paginate = [
                'limit' => 16,
                'order' => [
                    'StoresCourses.id' => 'DESC'
                    ]
                ];

            $StoresCourses = $this->paginate($this->StoresCourses);

            $this->set(compact(
                [
                'StoresCourses',
                'storesSliders',
                'storesPartners',
                ]
            ));
        }
    }

    public function store($idCategory = null)
    {
        $this->viewBuilder()->setLayout('site');

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
            $this->loadModel('Configs');

            $configs = $this->Configs->find('all')->first();

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

            if ($configs->show_type_products === 1) {
                $this->set(compact(
                    [
                    'storesCategories',
                    'storesProducts'
                    ]
                ));
            } elseif ($configs->show_type_products === 2) {
                $this->loadModel('StoresCourses');

                $this->paginate = [
                    'limit' => 6,
                    'order' => [
                        'StoresCourses.id' => 'DESC'
                    ]
                ];


                $storesCourses = $this->paginate($this->StoresCourses);

                $this->set(compact(
                    [
                    'storesCourses',
                    ]
                ));
            }
        }
    }

    public function demands()
    {
        $this->hasPermission('store');
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

        $this->set(
            [
            'storesCategories' => $storesCategories,
            'storesDemands' => $storesDemands
            ]
        );
    }

    public function productView($id = null, $colorId = null, $codeRandomProduct = null)
    {
        $this->viewBuilder()->setLayout('site');

        $this->loadModel('StoresProducts');

        $this->loadModel('StoresColors');

        $this->loadModel('StoresImagesProducts');

        $this->loadModel('StoresComments');

        $imagesExtrasProduct = $this->StoresImagesProducts->find('all', [
            'conditions' => [
                'StoresImagesProducts.stores_products_id =' => $id,
                'StoresImagesProducts.photo !=' => 'Null',
            ]
        ]);

        $relationshipProducts = null;

        if (!$colorId && !$codeRandomProduct) {
            $storesProduct = $this->StoresProducts->get(
                $id,
                [
                    'contain' => ['StoresCategories']
                ]
            );

            $relationshipProducts = $this->getRelationshipProducts($storesProduct);

            $data = [];

            if ($storesProduct->random_code == '1') {
                $data['random_code'] = uniqid('product_', true);

                $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);
                $this->StoresProducts->save($storesProduct);

                $storesProduct = $this->StoresProducts->get(
                    $id,
                    [
                        'contain' => ['StoresCategories']
                    ]
                );
            }

            if ($this->verifyColors($storesProduct)) {
                $idColor = $this->saveColor($id, $storesProduct->random_code);

                $data['stores_colors_id'] = $idColor;

                $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);
                $this->StoresProducts->save($storesProduct);
            }

            $storesColors = $this->StoresColors->find(
                'all',
                [
                    'conditions' => [
                        'StoresColors.product_flag_code =' => $storesProduct->random_code
                    ]
                ]
            );


            $idUser = $this->Auth->user() ? $this->Auth->user()['id'] : null;
        } else {
            $storesProduct = $this->StoresProducts->get(
                $id,
                [
                    'contain' => ['StoresCategories'],
                    'coditions' => [
                        'StoresProducts.stores_colors_id =' => $colorId,
                        'StoresProducts.randon_code =' => $codeRandomProduct
                    ]
                ]
            );

            $relationshipProducts = $this->getRelationshipProducts($storesProduct);

            $storesColors = $this->StoresColors->find(
                'all',
                [
                    'conditions' => [
                        'StoresColors.product_flag_code =' => $storesProduct->random_code
                    ]
                ]
            );

            $idUser = $this->Auth->user() ? $this->Auth->user()['id'] : null;
        }

        $storesComments = $this->StoresComments->find('all')->limit(7);

        $this->set(compact(
            [
                'storesProduct',
                'idUser',
                'storesColors',
                'imagesExtrasProduct',
                'relationshipProducts',
                'storesComments',
            ]
        ));
    }

    public function courseView($id = null)
    {
        $this->loadModel('StoresCourses');

        $storesCourse = $this->StoresCourses->get($id);

        $idUser = $this->Auth->user() ? $this->Auth->user()['id'] : null;

        $this->set(compact(
            [
                'storesCourse',
                'idUser'
            ]
        ));
    }

    private function getRelationshipProducts($storesProduct)
    {
        return $this->StoresProducts->find('all', [
            'conditions' => [
                'StoresProducts.stores_categories_id =' => $storesProduct->stores_categories_id,
            ]
        ])->limit(7);
    }

    public function storeCart($shippingValue = null, $cep = null, $prazoEntrega = null)
    {
        $this->hasPermission('store');

        $this->loadModel('Configs');

        $configs = $this->Configs->find('all')->first();

        if ($configs->show_type_products === 2) {
            return $this->redirect(['action' => 'storeCartDigital']);
        }

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
    }

    public function storeCartDigital($shippingValue = null, $cep = null, $prazoEntrega = null)
    {
        $this->hasPermission('store');

        $this->loadModel('StoresCarts');

        $storesCarts = $this->StoresCarts->find(
            'all',
            [
                'contain' => ['StoresCourses'],
                'conditions' => [
                    'StoresCarts.users_id =' => $this->Auth->user()['id'],
                    'StoresCarts.stores_courses_id !=' => 'null',
                ]
            ]
        );

        if (empty($storesCarts->toArray())) {
            return $this->redirect(['action' => 'store']);
        }

        $total = 0;

        foreach ($storesCarts as $storesCart) {
            $total =  $total + (str_replace(",", ".", $storesCart->stores_course->price) * (float) $storesCart->quantity);
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
    }

    public function storeRemoveItemCart($id = null)
    {
        $this->hasPermission('store');

        $this->loadModel('StoresCarts');

        $this->request->allowMethod(['post', 'delete']);

        $storesCart = $this->StoresCarts->get($id);

        $this->StoresCarts->delete($storesCart);

        $session = $this->request->getSession();

        $session->delete('Flash');

        return $this->redirect(['controller' => 'homes', 'action' => 'storeCart']);
    }

    public function storeCheckout()
    {
        $this->hasPermission('store');

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
    }

    public function storeConfirm($demandId = null)
    {
        $this->hasPermission('store');

        $this->set('demandId', $demandId);
    }

    public function calculateShipping()
    {
        $this->hasPermission('store');

        $cep = $this->request->getData()['cep'];
        $calculateShipping = $this->calculateShippingMain($cep);

        if ($calculateShipping === 'Error') {
            $this->Flash->error(__('Erro ao calcular frete.'));
            $this->redirect(['controller' => 'homes', 'action' => 'storeCart']);
        }
    }

    public function search($idCategory = null, $idSubCategory = null, $idFinalCategory = null)
    {
        $this->viewBuilder()->setLayout('site');

        $this->loadModel('StoresCategories');
        $this->loadModel('StoresProducts');

        $storesCategories = $this->StoresCategories->find(
            'all',
            [
                'limit' => 20
            ]
        );

        if ($idCategory && $idSubCategory && $idFinalCategory) {
            $this->paginate = [
                'limit' => 6,
                'order' => [
                    'StoresProducts.id' => 'DESC'
                ],
                'conditions' => [
                    'StoresProducts.quantity >' => 0,
                    'StoresProducts.online =' => 1,
                    'StoresProducts.active =' => 1,
                    'StoresProducts.stores_categories_id =' => $idCategory,
                    'StoresProducts.stores_subcategories_id =' => $idSubCategory,
                    'StoresProducts.stores_finalcategories_id =' => $idFinalCategory,
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
            $this->paginate = [
                'limit' => 6,
                'order' => [
                    'StoresProducts.id' => 'DESC'
                ],
                'conditions' => [
                    'StoresProducts.quantity >' => 0,
                    'StoresProducts.online =' => 1,
                    'StoresProducts.active =' => 1,
                    'StoresProducts.product LIKE' => $this->request->getQuery('search') . '%',
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

    public function editWhatsapp($number = null)
    {
        $this->hasPermission('store');

        $home = $this->Homes->find('all')->first();

        $data = $home;

        $data['whatsapp_number'] = $number;

        if ($this->request->is(['get'])) {
            $home = $this->Homes->patchEntity($home, $data->toArray());

            if ($this->Homes->save($home)) {
                return $this->response->withStatus(200)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'Salvo com sucesso!']));
            } else {
                return $this->response->withStatus(405)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'Erro!']));
            }
        }
    }

    public function editFacebook($link = null)
    {
        $this->hasPermission('store');

        $home = $this->Homes->find('all')->first();

        $data = $home;

        $data['facebook_link'] = base64_decode($link);

        if ($this->request->is(['get'])) {
            $home = $this->Homes->patchEntity($home, $data->toArray());

            if ($this->Homes->save($home)) {
                return $this->response->withStatus(200)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'Salvo com sucesso!']));
            } else {
                return $this->response->withStatus(405)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'Erro!']));
            }
        }
    }

    public function editInstagram($link = null)
    {
        $this->hasPermission('store');

        $home = $this->Homes->find('all')->first();

        $data = $home;

        $data['instagram_link'] = base64_decode($link);

        if ($this->request->is(['get'])) {
            $home = $this->Homes->patchEntity($home, $data->toArray());

            if ($this->Homes->save($home)) {
                return $this->response->withStatus(200)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'Salvo com sucesso!']));
            } else {
                return $this->response->withStatus(405)->withType('application/json')
                ->withStringBody(json_encode(['msg' => 'Erro!']));
            }
        }
    }

    private function saveColor($idProduct = null, $product_flag_code = null)
    {
        $this->loadModel('StoresColors');

        $storesColor = $this->StoresColors->newEntity();

        $data = [];
        $data['color'] = '#FFF';
        $data['product_flag_code'] = $product_flag_code;
        $data['stores_products_id'] = $idProduct;
        $storesColor = $this->StoresColors->patchEntity($storesColor, $data);

        $this->StoresColors->save($storesColor);

        return $storesColor->id;
    }

    private function verifyColors($storesProduct)
    {

        $storesColors = $this->StoresColors->find(
            'all',
            [
                'conditions' => [
                    'StoresColors.stores_products_id =' => $storesProduct->id
                ]
            ]
        );

        return empty($storesColors->toArray()) ? true : false;
    }

    public function error($message)
    {
        $this->hasPermission('store');

        $this->set('message', base64_decode($message));
    }
}
