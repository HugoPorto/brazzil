<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AmcVendasEmpresa Entity
 *
 * @property int $id
 * @property string $empresa
 * @property string $telefone
 * @property string $celular
 * @property int $amc_vendas_enderecos_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\AmcVendasEndereco $amc_vendas_endereco
 */
class AmcVendasEmpresa extends Entity
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
        'empresa' => true,
        'telefone' => true,
        'celular' => true,
        'amc_vendas_enderecos_id' => true,
        'created' => true,
        'modified' => true,
        'amc_vendas_endereco' => true
    ];
}
