<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Film Entity
 *
 * @property int $id
 * @property string $title
 * @property string $linkimage
 * @property string $launch
 * @property string $year
 * @property string $state
 * @property string $award
 * @property string $description
 * @property string $trailer
 * @property string $audio
 * @property string $duration
 * @property string $quality
 * @property string $link
 * @property string $embed
 * @property string $embeddubbed
 * @property string $embeddubbed2
 * @property string $embeddubbed3
 * @property string $embeddubbed4
 * @property string $embed2
 * @property string $embed3
 * @property string $embed4
 * @property bool $trend
 * @property bool $status
 * @property int $genres_id
 * @property int $views
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Genre $genre
 */
class Film extends Entity
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
        'title' => true,
        'linkimage' => true,
        'launch' => true,
        'year' => true,
        'state' => true,
        'award' => true,
        'description' => true,
        'trailer' => true,
        'audio' => true,
        'duration' => true,
        'quality' => true,
        'link' => true,
        'embed' => true,
        'embeddubbed' => true,
        'embeddubbed2' => true,
        'embeddubbed3' => true,
        'embeddubbed4' => true,
        'embed2' => true,
        'embed3' => true,
        'embed4' => true,
        'trend' => true,
        'status' => true,
        'genres_id' => true,
        'views' => true,
        'created' => true,
        'modified' => true,
        'genre' => true
    ];
}
