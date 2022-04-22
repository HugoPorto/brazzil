<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;

class UploadImageProfileComponent extends Component
{
    public $max_files = 3;
    public function upload($data, $galery, $user)
    {
        if (count($data) > $this->max_files) {
            $this->_registry->getController()->Flash->error('Limit exceded');
            return $this->_registry->getController()->redirect(['controller' => 'imageProfiles', 'action' => 'add']);
        }

        foreach ($data as $file) {
            $filename = $file['name'];
            $file_tmp_name = $file['tmp_name'];
            $file_ext = substr(strchr($filename, '.'), 1);
            $dir = WWW_ROOT . 'img' . DS . 'galerys' . DS . $galery;
            $type_allowed = array('png', 'jpg', 'jpeg', 'gif', 'pdf');
            if (!in_array($file_ext, $type_allowed)) {
                $this->_registry->getController()->Flash->error('Type of file not is allowed: "' . $file['type'] . '"');
                return $this->_registry->getController()->redirect(['action' => 'add']);
            } elseif (is_uploaded_file($file_tmp_name)) {
                $filename = Text::uuid() . '.' . $file_ext;
                $file_db = TableRegistry::get('ImageProfiles');
                $entity = $file_db->newEntity();
                $entity->image = $filename;
                $entity->galerys_id = $galery;
                $entity->users_id = $user;
                $file_db->save($entity);
                move_uploaded_file($file_tmp_name, $dir . DS . $filename);
            } else {
                $this->_registry->getController()->Flash->error(__('The image could not be saved. Please, try again.'));
                return $this->_registry->getController()->redirect(['action' => 'index']);
            }
        }

        $this->_registry->getController()->Flash->success(__('The images has been saved.'));
        return $this->_registry->getController()->redirect(
            [
                'controller' => 'users',
                'action' => 'profile'
            ]
        );
    }
}
