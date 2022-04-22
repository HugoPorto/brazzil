<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MyCoin Entity
 *
 * @property int $id
 * @property int $amount_of_currency
 * @property int $amount_of_currency_in_money
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $users_id
 * @property int $crypto_coins_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\CryptoCoin $crypto_coin
 */
class MyCoin extends Entity
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
        'amount_of_currency' => true,
        'amount_of_currency_in_money' => true,
        'created' => true,
        'modified' => true,
        'users_id' => true,
        'crypto_coins_id' => true,
        'user' => true,
        'crypto_coin' => true
    ];
}
