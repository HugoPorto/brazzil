<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * StoresCourses Controller
 *
 * @property \App\Model\Table\StoresCoursesTable $StoresCourses
 *
 * @method \App\Model\Entity\StoresCourse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresCoursesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Base64');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesCourses = $this->StoresCourses->find('all');

        $this->set(compact('storesCourses'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Course id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesCourse = $this->StoresCourses->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesCourse', $storesCourse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesCourse = $this->StoresCourses->newEntity();

        if ($this->request->is('post')) {
            $data = [];

            $data = $this->request->getData();

            $photo = $this->Base64->processMainPhoto($this->request->getData());

            $data['photo'] = $photo;

            $storesCourse = $this->StoresCourses->patchEntity($storesCourse, $data);

            if ($this->StoresCourses->save($storesCourse)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser salvo.']);
        }

        $this->set(compact('storesCourse'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Course id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesCourse = $this->StoresCourses->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesCourse = $this->StoresCourses->patchEntity($storesCourse, $this->request->getData());

            if ($this->StoresCourses->save($storesCourse)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser salvo.']);
        }

        $this->set(compact('storesCourse'));
    }

    public function editPhoto($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesCourse = $this->StoresCourses->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = [];

            $data = $this->request->getData();

            $photo = $this->Base64->processMainPhoto($this->request->getData());

            $data['photo'] = $photo;

            $storesCourse = $this->StoresCourses->patchEntity($storesCourse, $data);

            if ($this->StoresCourses->save($storesCourse)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser salvo.']);
        }

        $this->set(compact('storesCourse'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $this->request->allowMethod(['post', 'delete']);

        $storesCourse = $this->StoresCourses->get($id);

        if (!$this->StoresCourses->delete($storesCourse)) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser apagado.']);
        }

        return $this->redirect(['action' => 'index']);
    }

    public function courses()
    {
        $this->hasPermission('store');

        $this->viewBuilder()->setLayout('brazzil');

        $connection = ConnectionManager::get('default');

        $sql = 'select c.id, c.course as curso, c.photo
                from stores_courses c 
                inner join stores_demands md 
                inner join users u on md.users_id = u.id
                inner join stores_items_demands d on c.id = d.stores_courses_id and md.id = d.stores_demands_id
                where u.id =' . $this->Auth->user()['id'];

        $courses_user = $connection->execute($sql)->fetchAll();

        $this->set(compact('courses_user'));
    }

    public function courseView($id = null)
    {
        $this->hasPermission('store');

        $this->viewBuilder()->setLayout('brazzil');

        $storesCourse = $this->StoresCourses->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesCourse', $storesCourse);
    }

    public function videos($id = null)
    {
        $this->hasPermission('store');

        $this->viewBuilder()->setLayout('brazzil');

        $this->loadModel('StoresVideos');

        $storesVideos = $this->StoresVideos->find('all', [
            'conditions' =>
                [
                    'StoresVideos.stores_courses_id =' => $id,
                ]
        ]);

        $this->set('storesVideos', $storesVideos);
    }

    public function certificates($idUser = null)
    {
        $this->hasPermission('store');

        $this->viewBuilder()->setLayout('brazzil');

        return $this->redirect(['action' => 'courses']);
    }

    public function updateViewdVideo($id = null)
    {
        $this->autoRender = false;

        $this->hasPermission('store');

        $this->loadModel('StoresVideos');

        $storesVideo = $this->StoresVideos->get($id, [
            'contain' => []
        ]);

        $data = [];

        $data['viewed'] = true;

        $storesVideo = $this->StoresVideos->patchEntity($storesVideo, $data);

        $this->StoresVideos->save($storesVideo);

        $this->redirect($this->referer());
    }
}
