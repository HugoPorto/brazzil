<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExpensesWithDependent Entity
 *
 * @property int $id
 * @property string $school_faculty
 * @property string $extra_courses
 * @property string $school_supplies
 * @property string $sports_uniforms
 * @property string $allowance
 * @property string $tour_vacation
 * @property string $clothing
 * @property string $health_medicines
 * @property string $transport
 * @property string $others
 * @property int $mounths_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Mounth $mounth
 * @property \App\Model\Entity\User $user
 */
class ExpensesWithDependent extends Entity
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
        'school_faculty' => true,
        'extra_courses' => true,
        'school_supplies' => true,
        'sports_uniforms' => true,
        'allowance' => true,
        'tour_vacation' => true,
        'clothing' => true,
        'health_medicines' => true,
        'transport' => true,
        'others' => true,
        'mounths_id' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'mounth' => true,
        'user' => true
    ];
}
