<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresVideos Controller
 *
 * @property \App\Model\Table\StoresVideosTable $StoresVideos
 *
 * @method \App\Model\Entity\StoresVideo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresVideosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['StoresCourses', 'Users']
        ];
        $storesVideos = $this->paginate($this->StoresVideos);

        $this->set(compact('storesVideos'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores Video id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storesVideo = $this->StoresVideos->get($id, [
            'contain' => ['StoresCourses', 'Users']
        ]);

        $this->set('storesVideo', $storesVideo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storesVideo = $this->StoresVideos->newEntity();
        if ($this->request->is('post')) {
            $storesVideo = $this->StoresVideos->patchEntity($storesVideo, $this->request->getData());
            if ($this->StoresVideos->save($storesVideo)) {
                $this->Flash->success(__('The stores video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores video could not be saved. Please, try again.'));
        }
        $storesCourses = $this->StoresVideos->StoresCourses->find('list', ['limit' => 200]);
        $users = $this->StoresVideos->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesVideo', 'storesCourses', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores Video id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storesVideo = $this->StoresVideos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesVideo = $this->StoresVideos->patchEntity($storesVideo, $this->request->getData());
            if ($this->StoresVideos->save($storesVideo)) {
                $this->Flash->success(__('The stores video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores video could not be saved. Please, try again.'));
        }
        $storesCourses = $this->StoresVideos->StoresCourses->find('list', ['limit' => 200]);
        $users = $this->StoresVideos->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesVideo', 'storesCourses', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores Video id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesVideo = $this->StoresVideos->get($id);
        if ($this->StoresVideos->delete($storesVideo)) {
            $this->Flash->success(__('The stores video has been deleted.'));
        } else {
            $this->Flash->error(__('The stores video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
