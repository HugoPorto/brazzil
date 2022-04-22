<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VideosUser Entity
 *
 * @property int $id
 * @property string $video
 * @property string $photo
 * @property string $title
 * @property string $description
 * @property string $link_share
 * @property int $users_id
 * @property int $playlist_users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\PlaylistUser $playlist_user
 */
class VideosUser extends Entity
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
        'users_id' => true,
        'playlist_users_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'playlist_user' => true
    ];
}
