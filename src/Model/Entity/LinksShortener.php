<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LinksShortener Entity
 *
 * @property int $id
 * @property string $link
 * @property int $shorteners_id
 * @property int $videos_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Shortener $shortener
 * @property \App\Model\Entity\Video $video
 */
class LinksShortener extends Entity
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
        'link' => true,
        'shorteners_id' => true,
        'videos_id' => true,
        'created' => true,
        'modified' => true,
        'shortener' => true,
        'video' => true
    ];
}
