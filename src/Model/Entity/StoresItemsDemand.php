<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresItemsDemand Entity
 *
 * @property int $id
 * @property int $stores_demands_id
 * @property int $stores_products_id
 * @property string $quantity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\StoresDemand $stores_demand
 * @property \App\Model\Entity\StoresProduct $stores_product
 */
class StoresItemsDemand extends Entity
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
        'stores_demands_id' => true,
        'stores_products_id' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'stores_demand' => true,
        'stores_product' => true
    ];
}
