<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shortener Entity
 *
 * @property int $id
 * @property string $shortener
 * @property string $site
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Shortener extends Entity
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
        'shortener' => true,
        'site' => true,
        'created' => true,
        'modified' => true
    ];
}
