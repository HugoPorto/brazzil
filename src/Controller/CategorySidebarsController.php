<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategorySidebars Controller
 *
 * @property \App\Model\Table\CategorySidebarsTable $CategorySidebars
 *
 * @method \App\Model\Entity\CategorySidebar[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategorySidebarsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $categorySidebars = $this->paginate($this->CategorySidebars);

        $this->set(compact('categorySidebars'));
    }

    /**
     * View method
     *
     * @param string|null $id Category Sidebar id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categorySidebar = $this->CategorySidebars->get($id, [
            'contain' => []
        ]);

        $this->set('categorySidebar', $categorySidebar);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categorySidebar = $this->CategorySidebars->newEntity();
        if ($this->request->is('post')) {
            $categorySidebar = $this->CategorySidebars->patchEntity($categorySidebar, $this->request->getData());
            if ($this->CategorySidebars->save($categorySidebar)) {
                $this->Flash->success(__('The category sidebar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category sidebar could not be saved. Please, try again.'));
        }
        $this->set(compact('categorySidebar'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category Sidebar id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categorySidebar = $this->CategorySidebars->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categorySidebar = $this->CategorySidebars->patchEntity($categorySidebar, $this->request->getData());
            if ($this->CategorySidebars->save($categorySidebar)) {
                $this->Flash->success(__('The category sidebar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category sidebar could not be saved. Please, try again.'));
        }
        $this->set(compact('categorySidebar'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category Sidebar id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categorySidebar = $this->CategorySidebars->get($id);
        if ($this->CategorySidebars->delete($categorySidebar)) {
            $this->Flash->success(__('The category sidebar has been deleted.'));
        } else {
            $this->Flash->error(__('The category sidebar could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
