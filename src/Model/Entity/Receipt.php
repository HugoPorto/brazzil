<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Receipt Entity
 *
 * @property int $id
 * @property string $value
 * @property string $name_payer
 * @property string $cpf_cnpj_payer
 * @property string $regarding
 * @property string $city
 * @property \Cake\I18n\FrozenDate $date
 * @property string $issuer_name
 * @property string $phone
 * @property string $cpf_cnpj_issuer
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Receipt extends Entity
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
        'value' => true,
        'name_payer' => true,
        'cpf_cnpj_payer' => true,
        'regarding' => true,
        'city' => true,
        'date' => true,
        'issuer_name' => true,
        'phone' => true,
        'cpf_cnpj_issuer' => true,
        'created' => true,
        'modified' => true
    ];
}
