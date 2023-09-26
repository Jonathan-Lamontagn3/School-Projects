<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Continents Model
 *
 * @property \App\Model\Table\AuthorsTable&\Cake\ORM\Association\HasMany $Authors
 * @property \App\Model\Table\NationalitiesTable&\Cake\ORM\Association\HasMany $Nationalities
 *
 * @method \App\Model\Entity\Continent newEmptyEntity()
 * @method \App\Model\Entity\Continent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Continent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Continent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Continent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Continent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Continent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Continent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Continent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Continent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Continent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Continent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Continent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ContinentsTable extends Table
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

        $this->setTable('continents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Authors', [
            'foreignKey' => 'continent_id',
        ]);
        $this->hasMany('Nationalities', [
            'foreignKey' => 'continent_id',
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
}
