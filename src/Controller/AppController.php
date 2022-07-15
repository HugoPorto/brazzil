<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;

class AppController extends Controller
{
    private $urlPostOffice = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?';

    public function initialize()
    {
        I18n::locale('pt_BR');

        parent::initialize();

        $this->loadComponent('RequestHandler');

        $this->loadComponent('Maintenance');

        $this->loadComponent('Flash');

        $this->loadComponent(
            'Auth',
            [
                'authenticate' => [
                    'Form' => [
                        'fields' => [
                            'username' => 'username',
                            'password' => 'password'
                        ]
                    ]
                ], 'logoutRedirect' => ['controller' => 'users', 'action' => 'login']
            ]
        );
    }

    public function beforeFilter(Event $event)
    {
        $this->loadModels();

        $storesFooters = $this->StoresFooters->find('all')->first();

        $stripeSecret = $this->StoresStripeConfigs->find('all')->first();

        $configs = $this->Configs->find('all')->first();

        $home = $this->Homes->find('all')->first();

        $storesLogo = $this->StoresLogos->find('all')->first();

        $storesAbouts = $this->StoresAbouts->find('all')->first();

        $storesHours = $this->StoresHours->find('all')->first();

        $storesContacts = $this->StoresContacts->find('all')->first();

        $storesCategories = $this->StoresCategories->find('all');

        $storesSubcategories = $this->StoresSubcategories->find('all');

        $storesFinalcategories = $this->StoresFinalcategories->find('all');

        $storesTitles = $this->StoresTitles->find('all')->first();

        $storesPages = $this->StoresPages->find('all')->first();

        if ($this->Auth->user()) {
            if ($this->Roles->get($this->Auth->user()['roles_id'])->role === 'storeAdmin' || $this->Roles->get($this->Auth->user()['roles_id'])->role === 'store') {
                $imageProfileFront = $this->ImageProfiles->find('all')->where(['ImageProfiles.users_id =' => $this->Auth->user()['id']])->first();

                $imageProfileFront = $imageProfileFront === null ? [] : $imageProfileFront;

                $role = $this->Roles->get($this->Auth->user('roles_id'));

                $roleDefined = $role->role;

                $indexSidebars = $this->IndexSidebars->find(
                    'all',
                    [
                    'contain' =>
                        [
                            'Roles',
                            'CategorySidebars'
                        ]
                    ]
                );

                $boxValue = $this->StoresDemands->find()->select(['sum' => 'SUM(StoresDemands.value)'])->toArray();

                $usersCount = $this->Users->find('all')->count();

                $companysCount = $this->Companys->find('all')->count();

                $productsCount = $this->StoresProducts->find('all')->count();
            }
        } else {
            $roleDefined = 'common';

            $imageProfileFront = [];
        }

        $this->set(
            [
            'username' => $this->Auth->user('username'),
            'name' => $this->Auth->user('name'),
            'role' => $roleDefined,
            'idUser' => $this->Auth->user() ? $this->Auth->user()['id'] : null,
            'imageProfileFront' => $imageProfileFront,
            'indexSidebars' => $this->Auth->user() ? $indexSidebars : null,
            'storesFooters' => $storesFooters,
            'storesAbouts' => $storesAbouts,
            'storesHours' => $storesHours,
            'storesContacts' => $storesContacts,
            'stripeKey' => $stripeSecret->stripe_key,
            'storesLogo' => $storesLogo->logo,
            'whatsapp_number' => $home->whatsapp_number,
            'facebook_link' => $home->facebook_link,
            'instagram_link' => $home->instagram_link,
            'banner' => $home->banner,
            'storesCategories' => $storesCategories,
            'storesSubcategories' => $storesSubcategories,
            'storesFinalcategories' => $storesFinalcategories,
            'storesPagesTitles' => $storesTitles,
            'storesPages' => $storesPages,
            'configs' => $configs,
            'boxValue' => isset($boxValue) ? $boxValue : null,
            'usersCount' => isset($usersCount) ? $usersCount : null,
            'companysCount' => isset($companysCount) ? $companysCount : null,
            'productsCount' => isset($productsCount) ? $productsCount : null
            ]
        );
    }

    protected function loginMenuLoad()
    {
        $loginMenu = false;

        if ($this->Auth->user() !== null) {
            $loginMenu = true;
        }

        return $loginMenu;
    }

    protected function redirectReferer()
    {
        $this->redirect($this->referer());
    }

    protected function calculateShippingMain($cepCode)
    {
        $session = $this->request->getSession();

        $this->loadModel('StoresCarts');

        $storesCarts = $this->getCart();

        $portage = 0;

        $prazoEntrega = 0;

        $quantidade = 0;

        foreach ($storesCarts as $key => $storesCart) {
            $codigoEmpresa = '';

            $senhaEmpresa = '';

            $codigoServico = '04014';

            $cepOrigem = '66923090';

            $cepDestino = $cepCode;

            $peso = $storesCart->stores_product->weight;

            $formato = $storesCart->stores_product->package_format;

            $comprimento = $storesCart->stores_product->package_lengths;

            $altura = $storesCart->stores_product->package_height;

            $largura = $storesCart->stores_product->package_width;

            $diametro = 0;

            $maoPropria = false;

            $valorDeclarado = 0;

            $avisoRecebimento = false;

            $parametros = [
                'nCdServico' => $codigoServico,

                'sCepOrigem' => $cepOrigem,

                'sCepDestino' => $cepDestino,

                'nVlPeso' => $peso,

                'nCdFormato' => $formato,

                'nVlComprimento' => $comprimento,

                'nVlAltura' => $altura,

                'nVlLargura' => $largura,

                'nVlDiametro' => $diametro,

                'sCdMaoPropria' => $maoPropria ? 'S' : 'N',

                'nVlValorDeclarado' => $valorDeclarado,

                'sCdAvisoRecebimento' => $avisoRecebimento ? 'S' : 'N',

                'StrRetorno' => 'xml'
            ];

            $query = http_build_query($parametros);

            $url_api = $this->urlPostOffice . $query;

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $url_api,

                CURLOPT_RETURNTRANSFER => true,

                CURLOPT_CUSTOMREQUEST => 'GET',
            ]);

            $response = curl_exec($curl);

            curl_close($curl);

            $convert = strlen($response) ? simplexml_load_string($response) : null ;

            $result = $convert ? $convert->cServico : null;

            $calculateShippingError = null;

            if (!$result) {
                $calculateShippingError = 'Error';

                $this->log('Erro ao calcular frete.', 'debug');

                return $calculateShippingError;
            }

            if (strlen($result->MsgErro)) {
                $calculateShippingError = 'Error';

                $this->log($result->MsgErro, 'debug');

                return $calculateShippingError;
            }

            $portage = $portage + str_replace(",", ".", $result->Valor) * $storesCart->quantity;

            $quantidade = $quantidade + $storesCart->quantity;

            $prazoEntrega = $prazoEntrega + $result->PrazoEntrega * $storesCart->quantity;
        }

        $cep = $cepCode;

        if ($session->read('address_demand')) {
            return $portage;
        } else {
            return $this->redirect(['controller' => 'homes', 'action' => 'storeCart', $portage, $cep, $prazoEntrega / $quantidade]);
        }
    }

    protected function hasPermission($permission)
    {
        if (!($this->Auth->user() !== null) && !($this->Roles->get($this->Auth->user()['roles_id'])->role === $permission)) {
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }

        if ($this->request->controller === 'Homes' && $this->request->action === 'demands' && $permission === 'storeAdmin') {
            return $this->redirect(['controller' => 'Homes', 'action' => 'site']);
        }

        if ($this->request->controller === 'Pages' && $this->Roles->get($this->Auth->user()['roles_id'])->role === 'store') {
            return $this->redirect(['controller' => 'Homes', 'action' => 'site']);
        }

        if ($this->request->controller === 'Homes' && $this->Roles->get($this->Auth->user()['roles_id'])->role !== $permission) {
            return $this->redirect(['controller' => 'Homes', 'action' => 'site']);
        }

        if ($this->Roles->get($this->Auth->user()['roles_id'])->role !== $permission) {
            return $this->redirect(['controller' => 'Homes', 'action' => 'site']);
        }
    }

    protected function clearSession()
    {
        $_SESSION['superpass'] = false;
    }

    private function getCart()
    {
        $this->loadModel('StoresCarts');

        return $this->StoresCarts->find(
            'all',
            [
            'contain' => ['StoresProducts'],

            'conditions' =>
                [
                    'StoresCarts.users_id =' => $this->Auth->user()['id']
                ]
            ]
        );
    }

    private function loadModels()
    {
        $this->loadModel('Roles');

        $this->loadModel('ImageProfiles');

        $this->loadModel('IndexSidebars');

        $this->loadModel('StoresFooters');

        $this->loadModel('StoresAbouts');

        $this->loadModel('StoresHours');

        $this->loadModel('StoresContacts');

        $this->loadModel('StoresStripeConfigs');

        $this->loadModel('StoresLogos');

        $this->loadModel('StoresTitles');

        $this->loadModel('Homes');

        $this->loadModel('StoresCategories');

        $this->loadModel('StoresSubcategories');

        $this->loadModel('StoresFinalcategories');

        $this->loadModel('StoresPages');

        $this->loadModel('Configs');

        $this->loadModel('StoresDemands');

        $this->loadModel('Users');

        $this->loadModel('Companys');

        $this->loadModel('StoresProducts');
    }
}
