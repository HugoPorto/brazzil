<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Investment Entity
 *
 * @property int $id
 * @property string $actions
 * @property string $private_pension
 * @property string $cdbs_lcis_lcas
 * @property string $investment_funds
 * @property string $direct_treasure
 * @property string $loans
 * @property string $others
 * @property int $mounths_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Mounth $mounth
 * @property \App\Model\Entity\User $user
 */
class Investment extends Entity
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
        'actions' => true,
        'private_pension' => true,
        'cdbs_lcis_lcas' => true,
        'investment_funds' => true,
        'direct_treasure' => true,
        'loans' => true,
        'others' => true,
        'mounths_id' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'mounth' => true,
        'user' => true
    ];
}
