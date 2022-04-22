<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HealthExpenses Model
 *
 * @property \App\Model\Table\MounthsTable|\Cake\ORM\Association\BelongsTo $Mounths
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\HealthExpense get($primaryKey, $options = [])
 * @method \App\Model\Entity\HealthExpense newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HealthExpense[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HealthExpense|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HealthExpense patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HealthExpense[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HealthExpense findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HealthExpensesTable extends Table
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

        $this->setTable('health_expenses');
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
            ->scalar('health_plan')
            ->maxLength('health_plan', 10)
            ->allowEmpty('health_plan');

        $validator
            ->scalar('medical_appointment')
            ->maxLength('medical_appointment', 10)
            ->allowEmpty('medical_appointment');

        $validator
            ->scalar('exams')
            ->maxLength('exams', 10)
            ->allowEmpty('exams');

        $validator
            ->scalar('dentist')
            ->maxLength('dentist', 10)
            ->allowEmpty('dentist');

        $validator
            ->scalar('medicaments')
            ->maxLength('medicaments', 10)
            ->allowEmpty('medicaments');

        $validator
            ->scalar('therapy')
            ->maxLength('therapy', 10)
            ->allowEmpty('therapy');

        $validator
            ->scalar('life_insurance')
            ->maxLength('life_insurance', 10)
            ->allowEmpty('life_insurance');

        $validator
            ->scalar('others')
            ->maxLength('others', 10)
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
