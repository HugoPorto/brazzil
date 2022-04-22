<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VideoUserRegister Entity
 *
 * @property int $id
 * @property int $users_id
 * @property int $videos_id
 * @property string $location
 * @property string $ip
 * @property string $browser
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Video $video
 */
class VideoUserRegister extends Entity
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
        'users_id' => true,
        'videos_id' => true,
        'location' => true,
        'ip' => true,
        'browser' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'video' => true
    ];
}
