<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BusSubwayTrain Entity
 *
 * @property int $id
 * @property string $bus_subway_train
 * @property string $taxi_uber
 * @property string $vehicle_installment
 * @property string $car_insurance
 * @property string $fuel
 * @property string $ipva_dpvat_licensing
 * @property string $mechanic
 * @property string $fines
 * @property string $parking
 * @property string $tolls
 * @property string $others_financing_consortium
 * @property int $mounths_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Mounth $mounth
 * @property \App\Model\Entity\User $user
 */
class BusSubwayTrain extends Entity
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
        'bus_subway_train' => true,
        'taxi_uber' => true,
        'vehicle_installment' => true,
        'car_insurance' => true,
        'fuel' => true,
        'ipva_dpvat_licensing' => true,
        'mechanic' => true,
        'fines' => true,
        'parking' => true,
        'tolls' => true,
        'others_financing_consortium' => true,
        'mounths_id' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'mounth' => true,
        'user' => true
    ];
}
