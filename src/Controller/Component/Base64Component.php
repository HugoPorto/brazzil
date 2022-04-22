<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

use Cake\Controller\ComponentRegistry;

use Cake\Network\Exception\InternalErrorException;

use Cake\Utility\Text;

use Cake\ORM\TableRegistry;

class Base64Component extends Component
{
    public $max_files = 3;
    public $max_size = 2097152;

    public function convert($data)
    {
        if(count($data) > $this->max_files)
        {
            $this->_registry->getController()->Flash->error('Limit exceded');

            return $this->_registry->getController()->redirect(['controller' => 'StoresProducts', 'action' => 'add']);

        }

        foreach($data as $file)
        {
            if ($file['size'] > $this->max_size)
            {
                $this->_registry->getController()->Flash->error('O tamanho máximo permitido é 2M.');
                return $this->_registry->getController()->redirect(['controller' => 'StoresProducts', 'action' => 'add']);
            }


            $filename = $file['name'];

            $file_tmp_name = $file['tmp_name'];

            $file_ext = substr(strchr($filename, '.'), 1);

            $dir = WWW_ROOT.'img';

            $type_allowed = array('png', 'jpg', 'jpeg', 'gif');

            if(!in_array($file_ext, $type_allowed)){

                $this->_registry->getController()->Flash->error('Tipo não permitido: "'.$file['type'].'"');

                return $this->_registry->getController()->redirect(['controller' => 'StoresProducts', 'action' => 'add']);
            }
            elseif(is_uploaded_file($file_tmp_name))
            {
                $filename = Text::uuid().'.'.$file_ext;

                $path = $file_tmp_name;

                $data = file_get_contents($path);

                return $base64 = 'src="data:'.$file_ext.';base64,'.base64_encode($data).'"';
            }
            else
            {
                $this->_registry->getController()->Flash->error(__('A imagem não pode ser salva.'));

                return $this->_registry->getController()->redirect(['controller' => 'StoresProducts', 'action' => 'add']);
            }
        }

        $this->_registry->getController()->Flash->success(__('Imagem salva com sucesso.'));

        return $this->_registry->getController()->redirect(['controller' => 'StoresProducts', 'action' => 'index']);
    }
}
