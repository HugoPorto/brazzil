<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\I18n\Time;

class ToolsHelper extends Helper
{
    public $helpers = ['Html'];

    public function makeEdit($title, $url)
    {
        $link = $this->Html->link($title, $url, ['class' => 'edit']);

        return '<div class="editOuter">' . $link . '</div>';
    }

    public function formatDate($time = null) {
        return $time->format('d/m/Y');
	}
}
