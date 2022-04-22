<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Demand Entity
 *
 * @property int $id
 * @property string $demandcode
 * @property string $salesman
 * @property string $payment
 * @property string $valuereceive
 * @property int $clients_id
 * @property int $products_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Product $product
 */
class Demand extends Entity
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
        'demandcode' => true,
        'salesman' => true,
        'payment' => true,
        'valuereceive' => true,
        'clients_id' => true,
        'products_id' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'product' => true
    ];
}
