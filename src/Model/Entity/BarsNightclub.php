<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BarsNightclub Entity
 *
 * @property int $id
 * @property string $restaurants
 * @property string $cafes_ice_cream_shop
 * @property string $bars_nightclubs
 * @property string $bookstores
 * @property string $tickets
 * @property string $hotels
 * @property string $tours
 * @property string $others
 * @property int $mounths_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Mounth $mounth
 * @property \App\Model\Entity\User $user
 */
class BarsNightclub extends Entity
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
        'restaurants' => true,
        'cafes_ice_cream_shop' => true,
        'bars_nightclubs' => true,
        'bookstores' => true,
        'tickets' => true,
        'hotels' => true,
        'tours' => true,
        'others' => true,
        'mounths_id' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'mounth' => true,
        'user' => true
    ];
}
