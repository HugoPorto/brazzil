<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comic Entity
 *
 * @property int $id
 * @property string $comic
 * @property string $autor
 * @property bool $status
 * @property string $categories
 * @property string $description
 * @property string $chapters
 * @property string $thumb
 * @property string $embed
 * @property string $embeddubbed
 * @property int $magazines_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Magazine $magazine
 */
class Comic extends Entity
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
        'comic' => true,
        'autor' => true,
        'status' => true,
        'categories' => true,
        'description' => true,
        'chapters' => true,
        'thumb' => true,
        'embed' => true,
        'embeddubbed' => true,
        'magazines_id' => true,
        'created' => true,
        'modified' => true,
        'magazine' => true
    ];
}
