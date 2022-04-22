<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresStripeConfig Entity
 *
 * @property int $id
 * @property string $stripe_key
 * @property string $stripe_secret
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class StoresStripeConfig extends Entity
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
        'stripe_key' => true,
        'stripe_secret' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
