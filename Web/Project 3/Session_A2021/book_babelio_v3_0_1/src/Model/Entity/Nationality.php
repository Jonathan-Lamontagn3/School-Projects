<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nationality Entity
 *
 * @property int $id
 * @property int $continent_id
 * @property string $name
 *
 * @property \App\Model\Entity\Continent $continent
 * @property \App\Model\Entity\Author[] $authors
 */
class Nationality extends Entity
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
        'continent_id' => true,
        'name' => true,
        'continent' => true,
        'authors' => true,
    ];
}
