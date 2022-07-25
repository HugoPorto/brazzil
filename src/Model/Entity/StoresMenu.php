<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresMenu Entity
 *
 * @property int $id
 * @property string $menu
 * @property int $stores_courses_id
 * @property int $users_id
 * @property int $companys_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\StoresCourse $stores_course
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Company $company
 */
class StoresMenu extends Entity
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
        'menu' => true,
        'stores_courses_id' => true,
        'users_id' => true,
        'companys_id' => true,
        'created' => true,
        'modified' => true,
        'stores_course' => true,
        'user' => true,
        'company' => true
    ];
}
