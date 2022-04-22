<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity
 *
 * @property int $id
 * @property int $estados_id
 * @property int $cidades_id
 * @property string $cnpj
 * @property string $ie
 * @property string $im
 * @property string $fantasia
 * @property string $razao_social
 * @property string $endereco
 * @property string $numero
 * @property string $bairro
 * @property string $cep
 * @property string $telefone
 * @property string $email
 * @property float $juros_diario
 * @property float $multa
 * @property string $crt
 * @property string $cnae
 * @property string $codigo_revenda
 * @property string|resource $logo
 * @property string $ativo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\Cidade $cidade
 */
class Empresa extends Entity
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
        'estados_id' => true,
        'cidades_id' => true,
        'cnpj' => true,
        'ie' => true,
        'im' => true,
        'fantasia' => true,
        'razao_social' => true,
        'endereco' => true,
        'numero' => true,
        'bairro' => true,
        'cep' => true,
        'telefone' => true,
        'email' => true,
        'juros_diario' => true,
        'multa' => true,
        'crt' => true,
        'cnae' => true,
        'codigo_revenda' => true,
        'logo' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true,
        'estado' => true,
        'cidade' => true
    ];
}
