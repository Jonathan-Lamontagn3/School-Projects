<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
// the Text class
use Cake\Utility\Text;
// the EventInterface class
use Cake\Event\EventInterface;

/**
 * Books Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AuthorsTable&\Cake\ORM\Association\BelongsTo $Authors
 * @property \App\Model\Table\ReviewsTable&\Cake\ORM\Association\BelongsToMany $Reviews
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Book newEmptyEntity()
 * @method \App\Model\Entity\Book newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Book[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book get($primaryKey, $options = [])
 * @method \App\Model\Entity\Book findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Book[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BooksTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        // By default Eav strategy will be used.
        //$this->addBehavior('Translate', ['fields' => ['title', 'summary']]);

        $this->setTable('books');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Authors', [
            'foreignKey' => 'author_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Reviews', [
            'foreignKey' => 'book_id',
            'targetForeignKey' => 'review_id',
            'joinTable' => 'books_reviews',
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'book_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'books_tags',
        ]);
        $this->belongsToMany('Files', [
            'foreignKey' => 'book_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'books_files',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator {
        $validator
                ->integer('id')
                ->allowEmptyString('id', null, 'create');

        $validator
                ->scalar('title')
                ->maxLength('title', 255)
                ->requirePresence('title', 'create')
                ->notEmptyString('title');
        /*
          $validator
          ->scalar('slug')
          ->maxLength('slug', 255)
          ->requirePresence('slug', 'create')
          ->notEmptyString('slug');
         * 
         */

        $validator
                ->integer('nb_pages')
                ->requirePresence('nb_pages', 'create')
                ->notEmptyString('nb_pages');

        $validator
                ->numeric('rating')
                ->requirePresence('rating', 'create')
                ->notEmptyString('rating');

        $validator
                ->scalar('summary')
                ->requirePresence('summary', 'create')
                ->notEmptyString('summary');

        $validator
                ->allowEmptyFile('image_file')
                ->add('image_file', [
                    'mimeType' => [
                        'rule' => ['mimeType', ['image/jpg', 'image/png', 'image/jpeg']],
                        'message' => 'Please upload only jpg and png.',
                    ],
                    'fileSize' => [
                        'rule' => ['fileSize', '<=', '1MB'],
                        'message' => 'Image file size must be less than 1MB.',
                    ],
        ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['author_id'], 'Authors'), ['errorField' => 'author_id']);

        return $rules;
    }

    public function beforeSave(EventInterface $event, $entity, $options) {
        //debug($entity);        die();
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }

}
