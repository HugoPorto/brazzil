<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresTerm Entity
 *
 * @property int $id
 * @property string $terms
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $users_id
 *
 * @property \App\Model\Entity\User $user
 */
class StoresTerm extends Entity
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
        'terms' => true,
        'created' => true,
        'modified' => true,
        'users_id' => true,
        'user' => true
    ];
}
