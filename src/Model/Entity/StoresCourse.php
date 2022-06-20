<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresCourse Entity
 *
 * @property int $id
 * @property string $course
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $autor
 * @property string $theme
 * @property int $users_id
 * @property string $photo
 *
 * @property \App\Model\Entity\User $user
 */
class StoresCourse extends Entity
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
        'course' => true,
        'created' => true,
        'modified' => true,
        'autor' => true,
        'theme' => true,
        'users_id' => true,
        'photo' => true,
        'user' => true,
        'price' => true
    ];
}
