<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HealthExpense Entity
 *
 * @property int $id
 * @property string $health_plan
 * @property string $medical_appointment
 * @property string $exams
 * @property string $dentist
 * @property string $medicaments
 * @property string $therapy
 * @property string $life_insurance
 * @property string $others
 * @property int $mounths_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Mounth $mounth
 * @property \App\Model\Entity\User $user
 */
class HealthExpense extends Entity
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
        'health_plan' => true,
        'medical_appointment' => true,
        'exams' => true,
        'dentist' => true,
        'medicaments' => true,
        'therapy' => true,
        'life_insurance' => true,
        'others' => true,
        'mounths_id' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'mounth' => true,
        'user' => true
    ];
}
