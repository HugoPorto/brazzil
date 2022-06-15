<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Home Entity
 *
 * @property int $id
 * @property string $whatsapp_number
 * @property string $facebook_link
 */
class Home extends Entity
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
        'whatsapp_number' => true,
        'facebook_link' => true,
        'instagram_link' => true,
        'banner' => true,
    ];
}
