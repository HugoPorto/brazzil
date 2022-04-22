<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LowsProduct Entity
 *
 * @property int $id
 * @property int $stores_products_id
 * @property int $quantity
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\StoresProduct $stores_product
 * @property \App\Model\Entity\User $user
 */
class LowsProduct extends Entity
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
        'stores_products_id' => true,
        'quantity' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'stores_product' => true,
        'user' => true
    ];
}
