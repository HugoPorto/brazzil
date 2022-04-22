<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;

class UploadVoucherComponent extends Component
{
    public $max_files = 1;
    public $filename = null;
    public $file_tmp_name = null;
    public $file_ext = null;
    public $dir = null;
    public $type_allowed = null;

    public function upload($dataphoto, $data, $galery, $idPlaylist, $ownersid, $username)
    {
        $this->fileBiggerMaxFile($data);
        $this->createFilePath($dataphoto, $data, $galery);
        $this->sendAndRegisterFile($data, $username, $idPlaylist, $ownersid);
    }

    public function uploadUpdatePhoto($data, $galery, $user, $username, $videosUser)
    {
        $this->fileBiggerMaxFile($data);
        $this->createFilePath($data, $galery);
        $this->sendAndRegisterFileToUpdateVideoPhoto($data, $username, $videosUser);        
    }

    public function fileBiggerMaxFile($data)
    {
        if(count($data['photo']) > $this->max_files)
        {
            $this->_registry->getController()->Flash->error('Limit exceded');
            // return $this->_registry->getController()->redirect(['controller' => 'images', 'action' => 'index']);
        }
    }

    public function createFilePath($dataphoto, $data, $galery)
    {
        foreach($dataphoto as $file)
        {
            $this->filename = $file['name'];
            $this->file_tmp_name = $file['tmp_name'];
            $this->file_ext = substr(strchr($this->filename, '.'), 1);
            $this->dir = WWW_ROOT.'img'.DS.'galerys'.DS.$galery;
            $this->type_allowed = array('png', 'jpg', 'jpeg', 'gif');
        }
    }

    public function sendAndRegisterFile($data, $username =  null, $idPlaylist, $ownersid)
    {
        $file = $data;
        if(!in_array($this->file_ext, $this->type_allowed))
        {
            $this->_registry->getController()->Flash->error('Type of file not is allowed: "'.$file['photo']['type'].'"');
            return $this->_registry->getController()->redirect(['controller' => 'PatternPayments', 'action' => 'add', $username, $idPlaylist, $ownersid]);
        }
        elseif(is_uploaded_file($this->file_tmp_name))
        {
            $this->filename = Text::uuid().'.'.$this->file_ext;
            $file_db = TableRegistry::get('PatternPayments');
            $entity = $file_db->newEntity();
            $entity->playlist_users_id = $data['playlist_users_id'];            
            $entity->photo = $this->filename;         
            $entity->users_id = $data['users_id'];          
            $entity->ownersid = $data['ownersid'];         
            $entity->note = $data['note'];

            $file_db->save($entity);
            move_uploaded_file($this->file_tmp_name, $this->dir.DS.$this->filename);
        }
        else
        {
            $this->_registry->getController()->Flash->error(__('The image could not be saved. Please, try again.'));
            return $this->_registry->getController()->redirect(['controller' => 'PatternPayments', 'action' => 'add', $username, $idPlaylist, $ownersid]);
        }

        $this->_registry->getController()->Flash->success(__('The images has been saved.'));
        return $this->_registry->getController()->redirect(['controller' => 'PatternPayments', 'action' => 'viewSendPay', $username]);
    }

    public function sendAndRegisterFileToUpdateVideoPhoto($data, $username =  null, $videosUser)
    {
        $file = $data;
        if(!in_array($this->file_ext, $this->type_allowed))
        {
            $this->_registry->getController()->Flash->error('Type of file not is allowed: "'.$file['photo']['type'].'"');
            return $this->_registry->getController()->redirect(['action' => 'add']);
        }
        elseif(is_uploaded_file($this->file_tmp_name))
        {
            $this->filename = Text::uuid().'.'.$this->file_ext;
            $file_db = TableRegistry::get('VideosUsers');
            $entity = $file_db->patchEntity($videosUser, $data);           
            $entity->photo = $this->filename;

            $file_db->save($entity);
            move_uploaded_file($this->file_tmp_name, $this->dir.DS.$this->filename);
        }
        else
        {
            $this->_registry->getController()->Flash->error(__('The image could not be saved. Please, try again.'));
            return $this->_registry->getController()->redirect(['controller' => 'videosUsers', 'action' => 'add', $username]);
        }

        $this->_registry->getController()->Flash->success(__('The images has been saved.'));
        return $this->_registry->getController()->redirect(['controller' => 'videosUsers', 'action' => 'viewByUser', $username]);
    }
}
