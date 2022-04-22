<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresAddres Entity
 *
 * @property int $id
 * @property string $address
 * @property string $district
 * @property string $city
 * @property string $reference
 * @property string $number
 * @property string $cep
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $stores_demands_id
 * @property int $users_id
 *
 * @property \App\Model\Entity\StoresDemand $stores_demand
 * @property \App\Model\Entity\User $user
 */
class StoresAddres extends Entity
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
        'address' => true,
        'district' => true,
        'city' => true,
        'reference' => true,
        'number' => true,
        'cep' => true,
        'created' => true,
        'modified' => true,
        'stores_demands_id' => true,
        'users_id' => true,
        'stores_demand' => true,
        'user' => true
    ];
}
