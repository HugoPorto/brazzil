<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExpensesWithDependents Model
 *
 * @property \App\Model\Table\MounthsTable|\Cake\ORM\Association\BelongsTo $Mounths
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ExpensesWithDependent get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExpensesWithDependent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExpensesWithDependent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExpensesWithDependent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExpensesWithDependent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExpensesWithDependent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExpensesWithDependent findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExpensesWithDependentsTable extends Table
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

        $this->setTable('expenses_with_dependents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Mounths', [
            'foreignKey' => 'mounths_id',
            'joinType' => 'INNER'
        ]);
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
            ->scalar('school_faculty')
            ->maxLength('school_faculty', 45)
            ->allowEmpty('school_faculty');

        $validator
            ->scalar('extra_courses')
            ->maxLength('extra_courses', 45)
            ->allowEmpty('extra_courses');

        $validator
            ->scalar('school_supplies')
            ->maxLength('school_supplies', 45)
            ->allowEmpty('school_supplies');

        $validator
            ->scalar('sports_uniforms')
            ->maxLength('sports_uniforms', 45)
            ->allowEmpty('sports_uniforms');

        $validator
            ->scalar('allowance')
            ->maxLength('allowance', 45)
            ->allowEmpty('allowance');

        $validator
            ->scalar('tour_vacation')
            ->maxLength('tour_vacation', 45)
            ->allowEmpty('tour_vacation');

        $validator
            ->scalar('clothing')
            ->maxLength('clothing', 45)
            ->allowEmpty('clothing');

        $validator
            ->scalar('health_medicines')
            ->maxLength('health_medicines', 45)
            ->allowEmpty('health_medicines');

        $validator
            ->scalar('transport')
            ->maxLength('transport', 45)
            ->allowEmpty('transport');

        $validator
            ->scalar('others')
            ->maxLength('others', 45)
            ->allowEmpty('others');

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
        $rules->add($rules->existsIn(['mounths_id'], 'Mounths'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
