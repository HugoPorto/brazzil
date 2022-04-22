<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlaylistPrice Entity
 *
 * @property int $id
 * @property int $playlist_users_id
 * @property int $users_id
 * @property int $price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\PlaylistUser $playlist_user
 * @property \App\Model\Entity\User $user
 */
class PlaylistPrice extends Entity
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
        'playlist_users_id' => true,
        'users_id' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
        'playlist_user' => true,
        'user' => true
    ];
}
