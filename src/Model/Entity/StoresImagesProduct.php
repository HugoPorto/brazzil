<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresImagesProduct Entity
 *
 * @property int $id
 * @property string $photo
 * @property int $stores_products_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\StoresProduct $stores_product
 */
class StoresImagesProduct extends Entity
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
        'photo' => true,
        'stores_products_id' => true,
        'created' => true,
        'modified' => true,
        'stores_product' => true,
        'reference' => true,
    ];
}
