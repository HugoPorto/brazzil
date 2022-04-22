<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estado Entity
 *
 * @property int $id
 * @property string $iduf
 * @property string $uf
 * @property string $nome
 * @property string $icmscompra
 * @property string $icmsvenda
 * @property float $aliquota_interestadual
 * @property float $aliquota_fcp
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Estado extends Entity
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
        'iduf' => true,
        'uf' => true,
        'nome' => true,
        'icmscompra' => true,
        'icmsvenda' => true,
        'aliquota_interestadual' => true,
        'aliquota_fcp' => true,
        'created' => true,
        'modified' => true
    ];
}
