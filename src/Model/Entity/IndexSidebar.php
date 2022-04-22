<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IndexSidebar Entity
 *
 * @property int $id
 * @property string $sidebar
 * @property string $icon
 * @property string $url
 * @property int $roles_id
 * @property int $category_sidebars_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\CategorySidebar $category_sidebar
 * @property \App\Model\Entity\User $user
 */
class IndexSidebar extends Entity
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
        'sidebar' => true,
        'icon' => true,
        'url' => true,
        'roles_id' => true,
        'category_sidebars_id' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'category_sidebar' => true,
        'user' => true
    ];
}
