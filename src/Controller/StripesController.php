<?php

namespace App\Controller;

use Stripe;
use Cake\Mailer\MailerAwareTrait;

class StripesController extends AppController
{
    use MailerAwareTrait;

    public function stripe()
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
                $total = $this->totalCalculate();

                if ($total <= 0) {
                    return $this->redirect(['controller' => 'homes', 'action' => 'store']);
                }

                $this->set(compact("total"));
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    private function totalCalculate()
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

                $total = 0;

                foreach ($storesCarts as $storesCart) {
                    $total = $total + ($storesCart->stores_product->price * $storesCart->quantity);
                }

                $session = $this->request->getSession();

                if ($session->read('address_demand')) {
                    $totalShipping = $this->calculateShippingMain($session->read('address_demand')['cep']);
                    $shippingValue = str_replace(",", ".", $totalShipping);
                    $total = $total + (float) $shippingValue;
                } else {
                    $this->redirect(['controller' => 'homes', 'action' => 'storeCart']);
                }

                return $total;
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    public function payment()
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
                require_once VENDOR_PATH . '/stripe/stripe-php/init.php';

                $this->loadModel('StoresStripeConfigs');

                $stripe_secret = $this->StoresStripeConfigs->find('all')->first();

                Stripe\Stripe::setApiKey($stripe_secret->stripe_secret);

                $total = $this->totalCalculate();

                if ($total > 0) {
                    $stripe = Stripe\Charge::create([
                        "amount" => $total * 100,
                        "currency" => "brl",
                        "source" => $_REQUEST["stripeToken"],
                        "description" => "Pagamento recebido do usuário de código " . $this->Auth->user()['id']
                    ]);
                }

                if ($stripe->status === 'succeeded') {
                    $demandId = $this->saveDemand();

                    $this->saveAddress($demandId);

                    $this->saveItensDemands($demandId);

                    $this->cleanCart();

                    $this->sendEmail($demandId);

                    return $this->redirect(['controller' => 'homes', 'action' => 'storeConfirm', $demandId]);
                }

                $this->Flash->error(__('Payment refused'));

                return $this->redirect(['action' => 'stripe']);
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    private function saveAddress($idDemand)
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
                $this->loadModel('StoresAddress');

                $session = $this->request->getSession();

                $data = $session->read('address_demand');

                $data['users_id'] = $this->Auth->user()['id'];

                $data['stores_demands_id'] = $idDemand;

                $storesAddress = $this->StoresAddress->newEntity();

                $storesAddress = $this->StoresAddress->patchEntity($storesAddress, $data);

                $this->StoresAddress->save($storesAddress);

                $session->delete('address_demand');
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    private function saveItensDemands($demandId = null)
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
                $this->loadModel('StoresCarts');
                $this->loadModel('StoresItemsDemands');

                $storesCarts = $this->StoresCarts->find(
                    'all',
                    [
                    'contain' => ['StoresProducts'],
                    'conditions' => [
                        'StoresCarts.users_id =' => $this->Auth->user()['id']
                    ]
                    ]
                );

                $itensDemand = [];

                foreach ($storesCarts as $storesCart) {
                    $itensDemand = [
                        'stores_demands_id' => $demandId,
                        'stores_products_id' => $storesCart->stores_products_id,
                        'quantity' => $storesCart->quantity
                    ];

                    $storesItemsDemand = $this->StoresItemsDemands->newEntity();

                    $storesItemsDemand = $this->StoresItemsDemands->patchEntity($storesItemsDemand, $itensDemand);

                    $this->StoresItemsDemands->save($storesItemsDemand);
                }
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    private function saveDemand()
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
                $demand = [
                    'users_id' => $this->Auth->user()['id'],
                    'status' => 0
                ];

                $this->loadModel('StoresDemands');

                $storesDemand = $this->StoresDemands->newEntity();

                $storesDemand = $this->StoresDemands->patchEntity($storesDemand, $demand);

                $this->StoresDemands->save($storesDemand);

                return $storesDemand->id;
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    private function cleanCart()
    {
        if ($this->Auth->user() !== null) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role == 'store') {
                $this->loadModel('StoresCarts');

                $this->StoresCarts->deleteAll(['id >' => 0]);
            } else {
                $this->redirectSignup();
            }
        } else {
            $this->redirectSignup();
        }
    }

    private function sendEmail($demandId)
    {
        $this->getMailer('User')->send('demand', [$this->Auth->user()['email'], $demandId]);
    }
}
