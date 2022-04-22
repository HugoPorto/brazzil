<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Updatetrends Model
 *
 * @method \App\Model\Entity\Updatetrend get($primaryKey, $options = [])
 * @method \App\Model\Entity\Updatetrend newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Updatetrend[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Updatetrend|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Updatetrend patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Updatetrend[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Updatetrend findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UpdatetrendsTable extends Table
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

        $this->setTable('updatetrends');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('updatetrends')
            ->requirePresence('updatetrends', 'create')
            ->notEmpty('updatetrends');

        return $validator;
    }
}
