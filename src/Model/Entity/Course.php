<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property int $id
 * @property string $course
 * @property string $photo
 * @property string $description
 * @property string $subtitle
 * @property string $link
 * @property string $value
 * @property int $users_id
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Course extends Entity
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
        'course' => true,
        'photo' => true,
        'description' => true,
        'subtitle' => true,
        'link' => true,
        'value' => true,
        'users_id' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
