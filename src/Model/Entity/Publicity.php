<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Publicity Entity
 *
 * @property int $id
 * @property string $business
 * @property string $link
 * @property string $embed1
 * @property string $embed2
 * @property string $embed3
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Publicity extends Entity
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
        'business' => true,
        'link' => true,
        'embed1' => true,
        'embed2' => true,
        'embed3' => true,
        'created' => true,
        'modified' => true
    ];
}
