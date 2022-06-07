<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresPage Entity
 *
 * @property int $id
 * @property string $title
 * @property string $logo
 * @property string $about
 * @property string $mission
 * @property string $about_title
 * @property string $about_subtitle
 * @property string $team_title
 * @property string $team_subtitle
 * @property string $contact_title
 * @property string $contact_subtitle
 * @property string $price_title
 * @property string $price_subtitle
 */
class StoresPage extends Entity
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
        'logo' => true,
        'about' => true,
        'mission' => true,
        'about_title' => true,
        'about_subtitle' => true,
        'team_title' => true,
        'team_subtitle' => true,
        'contact_title' => true,
        'contact_subtitle' => true,
        'price_title' => true,
        'price_subtitle' => true
    ];
}
