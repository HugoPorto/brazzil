<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresProduct Entity
 *
 * @property int $id
 * @property string $product
 * @property string $description
 * @property string $price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $users_id
 * @property int $stores_categories_id
 * @property string $photo
 * @property int $quantity
 * @property bool $active
 * @property bool $online
 * @property string $barcode
 * @property string $qrcode
 * @property string $barcode_code
 * @property string $weight
 * @property string $package_format
 * @property string $package_lengths
 * @property string $package_height
 * @property string $package_width
 * @property string $random_code
 * @property int $stores_colors_id
 * @property int $stores_subcategories_id
 * @property int $stores_finalcategories_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\StoresCategory $stores_category
 * @property \App\Model\Entity\StoresColor $stores_color
 * @property \App\Model\Entity\StoresSubcategory $stores_subcategory
 * @property \App\Model\Entity\StoresFinalcategory $stores_finalcategory
 */
class StoresProduct extends Entity
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
        'product' => true,
        'description' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
        'users_id' => true,
        'stores_categories_id' => true,
        'photo' => true,
        'quantity' => true,
        'active' => true,
        'online' => true,
        'barcode' => true,
        'qrcode' => true,
        'barcode_code' => true,
        'weight' => true,
        'package_format' => true,
        'package_lengths' => true,
        'package_height' => true,
        'package_width' => true,
        'random_code' => true,
        'stores_colors_id' => true,
        'stores_subcategories_id' => true,
        'stores_finalcategories_id' => true,
        'user' => true,
        'stores_category' => true,
        'stores_color' => true,
        'stores_subcategory' => true,
        'stores_finalcategory' => true
    ];
}
