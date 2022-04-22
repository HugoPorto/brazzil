<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nft Entity
 *
 * @property int $id
 * @property string $nft
 * @property string $description
 * @property int $users_id
 * @property int $defis_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $value
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Defi $defi
 */
class Nft extends Entity
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
        'nft' => true,
        'description' => true,
        'users_id' => true,
        'defis_id' => true,
        'created' => true,
        'modified' => true,
        'value' => true,
        'user' => true,
        'defi' => true
    ];
}
