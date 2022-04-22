<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Video Entity
 *
 * @property int $id
 * @property string $video
 * @property string $photo
 * @property string $title
 * @property string $description
 * @property string $link_share
 * @property bool $sponsored
 * @property int $category_videos_id
 * @property int $publicitys_id
 * @property int $courses_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CategoryVideo $category_video
 * @property \App\Model\Entity\Publicity $publicity
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\User[] $users
 */
class Video extends Entity
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
        'photo' => true,
        'title' => true,
        'description' => true,
        'link_share' => true,
        'sponsored' => true,
        'category_videos_id' => true,
        'publicitys_id' => true,
        'courses_id' => true,
        'created' => true,
        'modified' => true,
        'category_video' => true,
        'publicity' => true,
        'course' => true,
        'users' => true
    ];
}
