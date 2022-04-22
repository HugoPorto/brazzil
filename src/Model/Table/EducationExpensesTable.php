<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EducationExpenses Model
 *
 * @property \App\Model\Table\MounthsTable|\Cake\ORM\Association\BelongsTo $Mounths
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\EducationExpense get($primaryKey, $options = [])
 * @method \App\Model\Entity\EducationExpense newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EducationExpense[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EducationExpense|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EducationExpense patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EducationExpense[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EducationExpense findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EducationExpensesTable extends Table
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

        $this->setTable('education_expenses');
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
            ->scalar('graduation')
            ->maxLength('graduation', 10)
            ->allowEmpty('graduation');

        $validator
            ->scalar('postgraduate_studies')
            ->maxLength('postgraduate_studies', 10)
            ->allowEmpty('postgraduate_studies');

        $validator
            ->scalar('specialization_courses')
            ->maxLength('specialization_courses', 10)
            ->allowEmpty('specialization_courses');

        $validator
            ->scalar('language_courses')
            ->maxLength('language_courses', 10)
            ->allowEmpty('language_courses');

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
