<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $author_id
 * @property string $title
 * @property string $slug
 * @property int $nb_pages
 * @property float $rating
 * @property string $summary
 * @property string $image
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Author $author
 * @property \App\Model\Entity\Review[] $reviews
 * @property \App\Model\Entity\Tag[] $tags
 */
class Book extends Entity
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
      //'user_id' => true,
        'title' => true,
        'author_id' => true,
      //'slug' => true,
        'nb_pages' => true,
        'rating' => true,
        'summary' => true,
        'image' => true,
      //'created' => true,
      //'modified' => true,
      //'user' => true,
      //'reviews' => true,
        'tags' => true,
    ];
}
