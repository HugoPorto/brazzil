<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ncm Entity
 *
 * @property int $id
 * @property string $codigo
 * @property string $descricao
 * @property float $aliquota_nacional
 * @property float $aliquota_internacional
 * @property float $aliquota_estadual
 * @property float $aliquota_municipal
 * @property string $ativo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Ncm extends Entity
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
        'codigo' => true,
        'descricao' => true,
        'aliquota_nacional' => true,
        'aliquota_internacional' => true,
        'aliquota_estadual' => true,
        'aliquota_municipal' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true
    ];
}
