<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Certificate Entity
 *
 * @property int $id
 * @property int $stores_courses_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $finished_course
 * @property string $code
 *
 * @property \App\Model\Entity\StoresCourse $stores_course
 * @property \App\Model\Entity\User $user
 */
class Certificate extends Entity
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
        'stores_courses_id' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'finished_course' => true,
        'code' => true,
        'stores_course' => true,
        'user' => true
    ];
}
