<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Videosseries Entity
 *
 * @property int $id
 * @property string $episode
 * @property string $description
 * @property string $thumb
 * @property string $numepisode
 * @property string $embed
 * @property string $embeddubbed
 * @property string $embeddubbed2
 * @property string $embeddubbed3
 * @property string $embeddubbed4
 * @property string $embed2
 * @property string $embed3
 * @property string $embed4
 * @property string $link
 * @property bool $trend
 * @property bool $status
 * @property int $series_id
 * @property int $seanseries_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Series $series
 * @property \App\Model\Entity\Seanseries $seanseries
 */
class Videosseries extends Entity
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
        'description' => true,
        'thumb' => true,
        'numepisode' => true,
        'embed' => true,
        'embeddubbed' => true,
        'embeddubbed2' => true,
        'embeddubbed3' => true,
        'embeddubbed4' => true,
        'embed2' => true,
        'embed3' => true,
        'embed4' => true,
        'link' => true,
        'trend' => true,
        'status' => true,
        'series_id' => true,
        'seanseries_id' => true,
        'created' => true,
        'modified' => true,
        'series' => true,
        'seanseries' => true
    ];
}
