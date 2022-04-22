<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MenuCourse Entity
 *
 * @property int $id
 * @property string $menu
 * @property string $description
 * @property int $courses_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Course $course
 */
class MenuCourse extends Entity
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
        'description' => true,
        'courses_id' => true,
        'created' => true,
        'modified' => true,
        'course' => true
    ];
}
