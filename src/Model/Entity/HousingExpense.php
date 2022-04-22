<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HousingExpense Entity
 *
 * @property int $id
 * @property string $rent
 * @property string $condominium
 * @property string $house_insurance
 * @property string $iptu
 * @property string $gas
 * @property string $light
 * @property string $services
 * @property string $tvsubscription
 * @property string $telephone_smartphone
 * @property string $installment_of_the_house
 * @property string $others
 * @property int $mounths_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Mounth $mounth
 * @property \App\Model\Entity\User $user
 */
class HousingExpense extends Entity
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
        'rent' => true,
        'condominium' => true,
        'house_insurance' => true,
        'iptu' => true,
        'gas' => true,
        'light' => true,
        'services' => true,
        'tvsubscription' => true,
        'telephone_smartphone' => true,
        'installment_of_the_house' => true,
        'others' => true,
        'mounths_id' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'mounth' => true,
        'user' => true
    ];
}
