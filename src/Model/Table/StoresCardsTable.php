<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoresCards Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\StoresCard get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoresCard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoresCard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoresCard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoresCard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoresCard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoresCard findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoresCardsTable extends Table
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

        $this->setTable('stores_cards');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('number')
            ->maxLength('number', 45)
            ->requirePresence('number', 'create')
            ->notEmpty('number');

        $validator
            ->scalar('date_expires')
            ->requirePresence('date_expires', 'create')
            ->notEmpty('date_expires');

        $validator
            ->scalar('security_code')
            ->maxLength('security_code', 3)
            ->requirePresence('security_code', 'create')
            ->notEmpty('security_code');

        $validator
            ->scalar('postal_code')
            ->maxLength('postal_code', 45)
            ->requirePresence('postal_code', 'create')
            ->notEmpty('postal_code');

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
