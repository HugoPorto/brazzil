<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresHour Entity
 *
 * @property int $id
 * @property string $hour
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $users_id
 *
 * @property \App\Model\Entity\User $user
 */
class StoresHour extends Entity
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
        'hour' => true,
        'created' => true,
        'modified' => true,
        'users_id' => true,
        'user' => true
    ];
}
