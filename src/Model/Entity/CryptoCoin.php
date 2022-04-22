<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CryptoCoin Entity
 *
 * @property int $id
 * @property string $coin
 * @property string $photo
 * @property string $url
 * @property string $max_supply
 * @property string $total_supply
 * @property string $coinmarketcap
 * @property string $external_url_photo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class CryptoCoin extends Entity
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
        'coin' => true,
        'photo' => true,
        'url' => true,
        'max_supply' => true,
        'total_supply' => true,
        'coinmarketcap' => true,
        'external_url_photo' => true,
        'created' => true,
        'modified' => true
    ];
}
