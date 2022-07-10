<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $company
 * @property int $users_id
 * @property string $photo
 * @property string $email
 * @property string $phone
 * @property string $fiscal_number
 * @property string $address
 * @property int $citys_id
 * @property string $cep
 * @property int $states_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\State $state
 */
class Company extends Entity
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
        'company' => true,
        'users_id' => true,
        'photo' => true,
        'email' => true,
        'phone' => true,
        'fiscal_number' => true,
        'address' => true,
        'citys_id' => true,
        'cep' => true,
        'states_id' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'user' => true,
        'city' => true,
        'state' => true
    ];
}
