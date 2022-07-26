<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CodesClass Entity
 *
 * @property int $id
 * @property string $code
 * @property int $stores_courses_id
 * @property int $companys_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $stores_menus_id
 *
 * @property \App\Model\Entity\StoresCourse $stores_course
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\StoresMenu $stores_menu
 */
class CodesClass extends Entity
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
        'code' => true,
        'stores_courses_id' => true,
        'companys_id' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'stores_menus_id' => true,
        'stores_course' => true,
        'company' => true,
        'user' => true,
        'stores_menu' => true
    ];
}
