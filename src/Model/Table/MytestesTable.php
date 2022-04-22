<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mytestes Model
 *
 * @method \App\Model\Entity\Mytestis get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mytestis newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mytestis[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mytestis|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mytestis patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mytestis[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mytestis findOrCreate($search, callable $callback = null, $options = [])
 */
class MytestesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('mytestes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('register_moment')
            ->requirePresence('register_moment', 'create')
            ->notEmpty('register_moment');

        $validator
            ->dateTime('register_moment_hour')
            ->requirePresence('register_moment_hour', 'create')
            ->notEmpty('register_moment_hour');

        return $validator;
    }
}
