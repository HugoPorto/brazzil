<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Anime Entity
 *
 * @property int $id
 * @property string $anime
 * @property string $linkimage
 * @property string $trailer
 * @property string $description
 * @property string $launch
 * @property string $advertising
 * @property string $sponsor
 * @property bool $trend
 * @property int $views
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Anime extends Entity
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
        'anime' => true,
        'linkimage' => true,
        'trailer' => true,
        'description' => true,
        'launch' => true,
        'advertising' => true,
        'sponsor' => true,
        'trend' => true,
        'views' => true,
        'created' => true,
        'modified' => true
    ];
}
