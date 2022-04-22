<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Amccliente Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $usuario
 * @property string $email
 * @property string $senha
 * @property int $amc_vendas_empresas_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\AmcVendasEmpresa $amc_vendas_empresa
 */
class Amccliente extends Entity
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
        'usuario' => true,
        'email' => true,
        'senha' => true,
        'amc_vendas_empresas_id' => true,
        'created' => true,
        'modified' => true,
        'amc_vendas_empresa' => true
    ];
}
