<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Text;

class Base64Component extends Component
{
    private $max_files = 3;
    private $max_size = 2097152;

    public function convert($data)
    {
        if (count($data) > $this->max_files) {
            return $this->_registry->getController()->redirect(['controller' => 'Pages', 'action' => 'error', 'Limite excedido.']);
        }

        foreach ($data as $file) {
            if ($file['size'] > $this->max_size) {
                return $this->_registry->getController()->redirect(['controller' => 'Pages', 'action' => 'error', 'O tamanho máximo permitido é 2M.']);
            }

            $filename = $file['name'];

            $file_tmp_name = $file['tmp_name'];

            $file_ext = substr(strchr($filename, '.'), 1);

            $type_allowed = array('png', 'jpg', 'jpeg', 'gif');

            if (!in_array($file_ext, $type_allowed)) {
                return $this->_registry->getController()->redirect(
                    ['controller' => 'Pages', 'action' => 'error', 'Tipo não permitido: "' . $file['type'] . '"']
                );
            } elseif (is_uploaded_file($file_tmp_name)) {
                $filename = Text::uuid() . '.' . $file_ext;

                $path = $file_tmp_name;

                $data = file_get_contents($path);

                $base64 = 'src="data:' . $file_ext . ';base64,' . base64_encode($data) . '"';

                return $base64;
            } else {
                return $this->_registry->getController()->redirect(['controller' => 'Pages', 'action' => 'error', 'A imagem não pode ser salva.']);
            }
        }

        return $this->_registry->getController()->redirect(['controller' => 'StoresProducts', 'action' => 'index']);
    }

    public function processMainPhoto($request)
    {
        return $request['photo'][0]['tmp_name'] !== '' ? $this->convert($request['photo']) : $this->_registry->getController()->redirect(['controller' => 'Pages', 'action' => 'error', 'Erro ao processar imagem.']);
    }

    public function processBannerPromotion($request)
    {
        return $request['banner'][0]['tmp_name'] !== '' ? $this->convert($request['banner']) : $this->_registry->getController()->redirect(['controller' => 'Pages', 'action' => 'error', 'Erro ao processar imagem.']);
    }
}
