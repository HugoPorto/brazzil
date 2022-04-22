<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fornecedore Entity
 *
 * @property int $id
 * @property int $planocontas_id
 * @property string $nome
 * @property string $razao_social
 * @property string $cnpj_cpf
 * @property string $ie
 * @property string $endereco
 * @property string $numero
 * @property string $bairro
 * @property string $cep
 * @property string $fone
 * @property string $fax
 * @property string $email_site
 * @property string $obs
 * @property int $estados_id
 * @property int $cidades_id
 * @property int $empresas_id
 * @property string $ativo
 * @property string $tipo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Planoconta $planoconta
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\Cidade $cidade
 * @property \App\Model\Entity\Empresa $empresa
 */
class Fornecedore extends Entity
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
        'planocontas_id' => true,
        'nome' => true,
        'razao_social' => true,
        'cnpj_cpf' => true,
        'ie' => true,
        'endereco' => true,
        'numero' => true,
        'bairro' => true,
        'cep' => true,
        'fone' => true,
        'fax' => true,
        'email_site' => true,
        'obs' => true,
        'estados_id' => true,
        'cidades_id' => true,
        'empresas_id' => true,
        'ativo' => true,
        'tipo' => true,
        'created' => true,
        'modified' => true,
        'planoconta' => true,
        'estado' => true,
        'cidade' => true,
        'empresa' => true
    ];
}
