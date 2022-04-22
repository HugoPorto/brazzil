<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Icm Entity
 *
 * @property int $id_icms
 * @property string $codigo_icms
 * @property string $desc_icms
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Icm extends Entity
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
        'codigo_icms' => true,
        'desc_icms' => true,
        'created' => true,
        'modified' => true
    ];
}
