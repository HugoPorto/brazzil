<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Grupotributaco Entity
 *
 * @property int $id
 * @property string $nome
 * @property int $csts_id
 * @property int $cfops_id
 * @property string $origem
 * @property float $icms_saida_aliquota
 * @property float $icms_saida_aliquota_red_base_calc
 * @property string $pis_saida
 * @property float $pis_saida_aliquota
 * @property string $cofins_saida
 * @property float $cofins_saida_aliquota
 * @property string $ativo
 *
 * @property \App\Model\Entity\Cst $cst
 * @property \App\Model\Entity\Cfop $cfop
 */
class Grupotributaco extends Entity
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
        'nome' => true,
        'csts_id' => true,
        'cfops_id' => true,
        'origem' => true,
        'icms_saida_aliquota' => true,
        'icms_saida_aliquota_red_base_calc' => true,
        'pis_saida' => true,
        'pis_saida_aliquota' => true,
        'cofins_saida' => true,
        'cofins_saida_aliquota' => true,
        'ativo' => true,
        'cst' => true,
        'cfop' => true
    ];
}
