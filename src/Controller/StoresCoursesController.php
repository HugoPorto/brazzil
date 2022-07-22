<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use CakePdf;

class StoresCoursesController extends AppController
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

        $storesCourses = $this->StoresCourses->find('all');

        $this->set(compact('storesCourses'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $storesCourse = $this->StoresCourses->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesCourse', $storesCourse);
    }

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

        $this->loadModel('StoresVideos');

        $this->loadModel('VideosVieweds');

        $this->loadModel('Certificates');

        $storesCourse = $this->StoresCourses->get($id);

        $videosCourseCount = $this->StoresVideos->find(
            'all',
            [
            'conditions' =>
                [
                    'StoresVideos.stores_courses_id =' => $id
                ]
            ]
        )->count();

        $videosViewedsCount = $this->VideosVieweds->find(
            'all',
            [
            'conditions' =>
                [
                    'VideosVieweds.stores_courses_id =' => $id,
                    'VideosVieweds.users_id =' => $this->Auth->user()['id']
                ]
            ]
        )->count();

        if ($videosViewedsCount > 0 && $videosCourseCount > 0) {
            $percentVieweds = ($videosViewedsCount * 100) / $videosCourseCount;
        } else {
            $percentVieweds = 0;

            $videosViewedsCount = 0;

            $videosCourseCount = 0;
        }

        $this->set(compact('storesCourse', 'videosCourseCount', 'percentVieweds', 'videosViewedsCount'));
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

    public function updateViewdVideo($idVideo = null, $idCourse = null)
    {
        $this->autoRender = false;

        $this->hasPermission('store');

        $this->loadModel('VideosVieweds');

        $userId = $this->Auth->user()['id'];

        $videosViewed = $this->VideosVieweds->newEntity();

        $data = [];

        $data['users_id'] = $userId;

        $data['stores_courses_id'] = $idCourse;

        $data['stores_videos_id'] = $idVideo;

        $videosViewed = $this->VideosVieweds->newEntity();

        $videosViewed = $this->VideosVieweds->patchEntity($videosViewed, $data);

        $this->VideosVieweds->save($videosViewed);

        $this->redirect($this->referer());
    }

    public function generateCertificate($idCourse = null, $nameCourse = null)
    {
        $this->autoRender = false;

        $this->hasPermission('store');

        $this->loadModel('StoresVideos');

        $this->loadModel('VideosVieweds');

        $this->loadModel('StoresLogos');

        $this->loadModel('Cpfs');

        $storesLogo = $this->StoresLogos->find('all')->first();

        $cpf = $this->Cpfs->find(
            'all',
            [
                'conditions' => [
                    'Cpfs.users_id =' => $this->Auth->user()['id']
                ]
            ]
        )->first();

        $videosCourseCount = $this->StoresVideos->find(
            'all',
            [
            'conditions' =>
                [
                    'StoresVideos.stores_courses_id =' => $idCourse
                ]
            ]
        )->count();

        $videosViewedsCount = $this->VideosVieweds->find(
            'all',
            [
            'conditions' =>
                [
                    'VideosVieweds.stores_courses_id =' => $idCourse,
                    'VideosVieweds.users_id =' => $this->Auth->user()['id']
                ]
            ]
        )->count();

        if ($videosCourseCount === $videosViewedsCount) {
            $this->loadModel('Certificates');

            $certificate = $this->Certificates->find(
                'all',
                [
                    'conditions' => [
                        'Certificates.users_id =' => $this->Auth->user()['id'],
                        'Certificates.stores_courses_id =' => $idCourse
                    ]
                ]
            )->first();

            $CakePdf = new \CakePdf\Pdf\CakePdf();

            $CakePdf->template('certificate', 'certificate');

            $CakePdf->orientation('landscape');

            $CakePdf->marginLeft(10);

            $CakePdf->marginBottom(10);

            $CakePdf->marginTop(10);

            $CakePdf->marginBottom(10);

            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

            date_default_timezone_set('America/Sao_Paulo');

            $codeCertificate = uniqid('certificate_', true);

            if ($certificate) {
                $CakePdf->viewVars(
                    [
                    'logo' => $storesLogo->logo,
                    'name' => $this->Auth->user()['name'],
                    'lastname' => $this->Auth->user()['lastname'],
                    'cpf' => $cpf->cpf,
                    'course' => $nameCourse,
                    'date' => $certificate->finished_course,
                    'code' => $certificate->code
                    ]
                );

                $CakePdf->output();

                $CakePdf->write(WWW_ROOT . 'files' . DS . 'certificate.pdf');

                $this->redirect('/files' . DS . 'certificate.pdf');
            } else {
                $date = strftime('%A, %d de %B de %Y', strtotime('today'));

                $CakePdf->viewVars(
                    [
                    'logo' => $storesLogo->logo,
                    'name' => $this->Auth->user()['name'],
                    'lastname' => $this->Auth->user()['lastname'],
                    'cpf' => $cpf->cpf,
                    'course' => $nameCourse,
                    'date' => $date,
                    'code' => $codeCertificate,
                    ]
                );

                $this->addCertificate($idCourse, $date, $codeCertificate);

                $CakePdf->output();

                $CakePdf->write(WWW_ROOT . 'files' . DS . 'certificate.pdf');

                $this->redirect('/files' . DS . 'certificate.pdf');
            }
        } else {
            return $this->redirect(['controller' => 'Homes', 'action' => 'errorGeneral', base64_encode('Você ainda não concluiu o curso.')]);
        }
    }

    private function addCertificate($idCourse = null, $date = null, $code = null)
    {
        $certificate = $this->Certificates->newEntity();

        $data = [];

        $data['users_id'] = $this->Auth->user()['id'];

        $data['stores_courses_id'] = $idCourse;

        $data['finished_course'] = $date;

        $data['code'] = $code;

        $certificate = $this->Certificates->patchEntity($certificate, $data);

        $this->Certificates->save($certificate);
    }
}
