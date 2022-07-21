<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CoursesDownload Entity
 *
 * @property int $id
 * @property string $link
 * @property int $stores_courses_id
 * @property int $stores_videos_id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $users_id
 * @property int $companys_id
 *
 * @property \App\Model\Entity\StoresCourse $stores_course
 * @property \App\Model\Entity\StoresVideo $stores_video
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Company $company
 */
class CoursesDownload extends Entity
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
        'link' => true,
        'stores_courses_id' => true,
        'stores_videos_id' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'users_id' => true,
        'companys_id' => true,
        'stores_course' => true,
        'stores_video' => true,
        'user' => true,
        'company' => true
    ];
}
