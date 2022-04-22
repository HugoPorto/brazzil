<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Accompaniment Entity
 *
 * @property int $id
 * @property string $project
 * @property string $daily_contribution
 * @property string $amount
 * @property string $coin_main
 * @property string $coin_second
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $users_id
 *
 * @property \App\Model\Entity\User $user
 */
class Accompaniment extends Entity
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
        'project' => true,
        'daily_contribution' => true,
        'amount' => true,
        'coin_main' => true,
        'coin_second' => true,
        'quote_on_the_day' => true,
        'url' => true,
        'created' => true,
        'modified' => true,
        'users_id' => true,
        'user' => true,
        'register_moment' => true,
    ];
}
