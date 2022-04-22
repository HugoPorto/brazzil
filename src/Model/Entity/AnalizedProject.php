<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AnalizedProject Entity
 *
 * @property int $id
 * @property string $project
 * @property string $description
 * @property bool $long_time
 * @property bool $short_time
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class AnalizedProject extends Entity
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
        'project' => true,
        'description' => true,
        'long_time' => true,
        'short_time' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
