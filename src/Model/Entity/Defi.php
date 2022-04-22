<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Defi Entity
 *
 * @property int $id
 * @property string $defi
 * @property string $whitepaper
 * @property string $site
 * @property string $code
 * @property string $search
 * @property string $coinmarketcap
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 */
class Defi extends Entity
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
        'defi' => true,
        'whitepaper' => true,
        'site' => true,
        'code' => true,
        'search' => true,
        'coinmarketcap' => true,
        'created' => true,
        'modified' => true
    ];
}
