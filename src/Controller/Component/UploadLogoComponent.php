<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Text;
use Cake\Filesystem\File;

class UploadLogoComponent extends Component
{
    private $max_files = 1;
    private $filename = null;
    private $file_tmp_name = null;
    private $file_ext = null;
    private $dir = null;
    private $type_allowed = null;

    public function upload($data, $galery, $idBanner = null)
    {
        $this->fileBiggerMaxFile($data);
        $this->createFilePath($data, $galery);
        $this->sendFile($data, $idBanner);
    }

    private function fileBiggerMaxFile($data)
    {
        if (count($data) > $this->max_files) {
            $this->_registry->getController()->Flash->error('Você selecionou mais de um arquivo.');
            return $this->_registry->getController()->redirect(['controller' => 'storesLogos', 'action' => 'add']);
        }
    }

    private function createFilePath($data, $galery)
    {
        foreach ($data as $file) {
            $this->filename = $file['name'];
            $this->file_tmp_name = $file['tmp_name'];
            $this->file_ext = substr(strchr($this->filename, '.'), 1);
            $this->dir = WWW_ROOT . 'img' . DS . 'galerys' . DS . $galery;
            $this->type_allowed = array('png', 'jpg', 'jpeg', 'gif');
        }
    }

    private function sendFile($data, $idBanner = null)
    {
        $file = $data;

        if ((int) $data[0]['size'] > 2000000) {
            $this->_registry->getController()->Flash->error('O arquivo não pode ser maior que 2 mega.');
            return $this->_registry->getController()->redirect(['action' => 'edit', $idBanner]);
        }

        $this->filename = Text::uuid() . '.' . $this->file_ext;

        if (!in_array($this->file_ext, $this->type_allowed)) {
            $this->_registry->getController()->Flash->error('Tipo de arquivo não permitido: "' . $file[0]['type'] . '"');
            return $this->_registry->getController()->redirect(['action' => 'add']);
        } elseif (is_uploaded_file($this->file_tmp_name)) {
            move_uploaded_file($this->file_tmp_name, $this->dir . DS . $this->filename);

            $_SESSION['fileImageName'] = $this->filename;
        } else {
            $this->_registry->getController()->Flash->error(__('Essa imagem não pode ser salva. Por favor, tente novamente.'));
            return $this->_registry->getController()->redirect(['controller' => 'storesLogos', 'action' => 'add']);
        }

        $this->_registry->getController()->Flash->success(__('As imagens foram salvas com sucesso.'));

        return $this->_registry->getController()->redirect(['controller' => 'storesLogos', 'action' => 'index']);
    }
}
