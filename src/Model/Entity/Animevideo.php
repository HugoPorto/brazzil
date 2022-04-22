<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Animevideo Entity
 *
 * @property int $id
 * @property string $episode
 * @property string $thumb
 * @property string $numepisode
 * @property string $embed
 * @property string $link
 * @property int $animes_id
 * @property int $seans_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Anime $anime
 * @property \App\Model\Entity\Sean $sean
 */
class Animevideo extends Entity
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
        'episode' => true,
        'thumb' => true,
        'numepisode' => true,
        'embed' => true,
        'link' => true,
        'animes_id' => true,
        'seans_id' => true,
        'created' => true,
        'modified' => true,
        'anime' => true,
        'sean' => true
    ];
}
