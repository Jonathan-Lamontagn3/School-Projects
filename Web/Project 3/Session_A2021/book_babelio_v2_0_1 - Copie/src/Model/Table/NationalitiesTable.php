<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nationalities Model
 *
 * @property \App\Model\Table\ContinentsTable&\Cake\ORM\Association\BelongsTo $Continents
 * @property \App\Model\Table\AuthorsTable&\Cake\ORM\Association\HasMany $Authors
 *
 * @method \App\Model\Entity\Nationality newEmptyEntity()
 * @method \App\Model\Entity\Nationality newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Nationality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nationality get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nationality findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Nationality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nationality[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nationality|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nationality saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nationality[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nationality[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nationality[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nationality[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class NationalitiesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('nationalities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Continents', [
            'foreignKey' => 'continent_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Authors', [
            'foreignKey' => 'nationality_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['continent_id'], 'Continents'), ['errorField' => 'continent_id']);

        return $rules;
    }
}
