<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresSlider Entity
 *
 * @property int $id
 * @property string $slider
 * @property string $title
 * @property string $subtitle
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $users_id
 * @property int $galerys_id
 *
 * @property \App\Model\Entity\User $user
 */
class StoresSlider extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'slider' => true,
        'title' => true,
        'subtitle' => true,
        'created' => true,
        'modified' => true,
        'users_id' => true,
        'galerys_id' => true,
        'user' => true
    ];
}
