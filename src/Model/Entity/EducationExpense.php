<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EducationExpense Entity
 *
 * @property int $id
 * @property string $graduation
 * @property string $postgraduate_studies
 * @property string $specialization_courses
 * @property string $language_courses
 * @property string $others
 * @property int $mounths_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Mounth $mounth
 * @property \App\Model\Entity\User $user
 */
class EducationExpense extends Entity
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
        'graduation' => true,
        'postgraduate_studies' => true,
        'specialization_courses' => true,
        'language_courses' => true,
        'others' => true,
        'mounths_id' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'mounth' => true,
        'user' => true
    ];
}
