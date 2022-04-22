<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Download Entity
 *
 * @property int $id
 * @property string $link
 * @property int $users_id
 * @property int $videos_id
 * @property int $shorteners_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Video $video
 * @property \App\Model\Entity\Shortener $shortener
 */
class Download extends Entity
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
        'users_id' => true,
        'videos_id' => true,
        'shorteners_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'video' => true,
        'shortener' => true
    ];
}
