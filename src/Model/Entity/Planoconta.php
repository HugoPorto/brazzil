<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Planoconta Entity
 *
 * @property int $id
 * @property string $codigo
 * @property string $nome
 * @property string $tipo_conta
 * @property string $categoria_conta
 * @property string $modo_conta
 * @property string $ordem
 * @property string $ativo
 * @property int $centroresultado_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Centroresultado $centroresultado
 */
class Planoconta extends Entity
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
        'nome' => true,
        'tipo_conta' => true,
        'categoria_conta' => true,
        'modo_conta' => true,
        'ordem' => true,
        'ativo' => true,
        'centroresultado_id' => true,
        'created' => true,
        'modified' => true,
        'centroresultado' => true
    ];
}
