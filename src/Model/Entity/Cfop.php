<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cfop Entity
 *
 * @property int $id
 * @property string $codigocfop
 * @property string $descricao
 * @property string $aplicacao
 * @property string $ativo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Cfop extends Entity
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
        'codigocfop' => true,
        'descricao' => true,
        'aplicacao' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true
    ];
}
