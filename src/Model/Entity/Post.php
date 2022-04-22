<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property string $title
 * @property string $photo
 * @property string $post
 * @property string $link_share
 * @property string $extra_publicity_code
 * @property int $category_posts_id
 * @property int $publicitys_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CategoryPost $category_post
 * @property \App\Model\Entity\Publicity $publicity
 */
class Post extends Entity
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
        'title' => true,
        'photo' => true,
        'post' => true,
        'link_share' => true,
        'extra_publicity_code' => true,
        'category_posts_id' => true,
        'publicitys_id' => true,
        'created' => true,
        'modified' => true,
        'category_post' => true,
        'publicity' => true
    ];
}
