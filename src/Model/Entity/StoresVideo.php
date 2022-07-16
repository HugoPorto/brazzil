<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresVideo Entity
 *
 * @property int $id
 * @property string $video
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $stores_courses_id
 * @property int $users_id
 * @property string $photo
 * @property bool $viewed
 *
 * @property \App\Model\Entity\StoresCourse $stores_course
 * @property \App\Model\Entity\User $user
 */
class StoresVideo extends Entity
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
        'video' => true,
        'title' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'stores_courses_id' => true,
        'users_id' => true,
        'photo' => true,
        'viewed' => true,
        'stores_course' => true,
        'user' => true
    ];
}
