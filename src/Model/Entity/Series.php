<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Series Entity
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
 * @property bool $trend
 * @property bool $status
 * @property int $genreseries_id
 * @property int $views
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Genreseries $genreseries
 * @property \App\Model\Entity\Seanseries[] $seanseries
 * @property \App\Model\Entity\Videosseries[] $videosseries
 */
class Series extends Entity
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
        'trend' => true,
        'status' => true,
        'genreseries_id' => true,
        'views' => true,
        'created' => true,
        'modified' => true,
        'genreseries' => true,
        'seanseries' => true,
        'videosseries' => true
    ];
}
