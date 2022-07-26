<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Slides Controller
 *
 * @property \App\Model\Table\SlidesTable $Slides
 *
 * @method \App\Model\Entity\Slide[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SlidesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $slides = $this->Slides->find('all', [
            'contain' => [
                'StoresCourses',
                'Users',
                'Companys'
            ]
        ]);

        $this->set(compact('slides'));
    }

    /**
     * View method
     *
     * @param string|null $id Slide id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $slide = $this->Slides->get($id, [
            'contain' => ['StoresCourses', 'Users', 'Companys']
        ]);

        $this->set('slide', $slide);
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

        $slide = $this->Slides->newEntity();

        if ($this->request->is('post')) {
            $slide = $this->Slides->patchEntity($slide, $this->request->getData());

            if ($this->Slides->save($slide)) {
                $this->Flash->success(__('The slide has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The slide could not be saved. Please, try again.'));
        }

        $storesCourses = $this->Slides->StoresCourses->find('list');

        $this->set(compact('slide', 'storesCourses', 'users', 'companys'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Slide id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('brazzil');

        $slide = $this->Slides->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $slide = $this->Slides->patchEntity($slide, $this->request->getData());

            if ($this->Slides->save($slide)) {
                $this->Flash->success(__('O slide foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Não foi possível salvar o slide. Por favor, tente novamente.'));
        }

        $storesCourses = $this->Slides->StoresCourses->find('list');

        $this->set(compact('slide', 'storesCourses', 'users', 'companys'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Slide id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->request->allowMethod(['post', 'delete']);

        $slide = $this->Slides->get($id);

        if ($this->Slides->delete($slide)) {
            $this->Flash->success(__('The slide has been deleted.'));
        } else {
            $this->Flash->error(__('The slide could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
