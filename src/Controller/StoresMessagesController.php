<?php
namespace App\Controller;

use App\Controller\AppController;

class StoresMessagesController extends AppController
{
    public function index()
    {
        $storesMessages = $this->paginate($this->StoresMessages);

        $this->set(compact('storesMessages'));
    }

    public function view($id = null)
    {
        $storesMessage = $this->StoresMessages->get($id, [
            'contain' => []
        ]);

        $this->set('storesMessage', $storesMessage);
    }

    public function add()
    {
        $storesMessage = $this->StoresMessages->newEntity();
        if ($this->request->is('post')) {
            $storesMessage = $this->StoresMessages->patchEntity($storesMessage, $this->request->getData());
            if ($this->StoresMessages->save($storesMessage)) {
                $this->Flash->success(__('The stores message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores message could not be saved. Please, try again.'));
        }
        $this->set(compact('storesMessage'));
    }
}
