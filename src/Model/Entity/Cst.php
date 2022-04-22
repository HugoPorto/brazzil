<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cst Entity
 *
 * @property int $id
 * @property string $codigotributario
 * @property string $descricao
 * @property float $icms
 * @property string $ativo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Cst extends Entity
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
        'codigotributario' => true,
        'descricao' => true,
        'icms' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true
    ];
}
