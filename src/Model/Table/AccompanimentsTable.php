<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accompaniments Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Accompaniment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Accompaniment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Accompaniment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Accompaniment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accompaniment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Accompaniment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Accompaniment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AccompanimentsTable extends Table
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

        $this->setTable('accompaniments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
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
        ->scalar('project')
        ->maxLength('project', 45)
        ->requirePresence('project', 'create')
        ->notEmpty('project');

        $validator
        ->scalar('daily_contribution')
        ->maxLength('daily_contribution', 20)
        ->requirePresence('daily_contribution', 'create')
        ->notEmpty('daily_contribution');

        $validator
        ->scalar('amount')
        ->maxLength('amount', 20)
        ->requirePresence('amount', 'create')
        ->notEmpty('amount');

        $validator
        ->scalar('coin_main')
        ->maxLength('coin_main', 20)
        ->requirePresence('coin_main', 'create')
        ->notEmpty('coin_main');

        $validator
        ->scalar('coin_second')
        ->maxLength('coin_second', 20)
        ->allowEmpty('coin_second');

        $validator
        ->scalar('quote_on_the_day')
        ->maxLength('quote_on_the_day', 20)
        ->notEmpty('quote_on_the_day');

        $validator
        ->scalar('url')
        ->maxLength('url', 255)
        ->allowEmpty('url');

        $validator
        ->date('register_moment')
        ->allowEmpty('register_moment');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
