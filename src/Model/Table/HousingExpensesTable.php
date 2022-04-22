<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HousingExpenses Model
 *
 * @property \App\Model\Table\MounthsTable|\Cake\ORM\Association\BelongsTo $Mounths
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\HousingExpense get($primaryKey, $options = [])
 * @method \App\Model\Entity\HousingExpense newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HousingExpense[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HousingExpense|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HousingExpense patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HousingExpense[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HousingExpense findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HousingExpensesTable extends Table
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

        $this->setTable('housing_expenses');
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
            ->scalar('rent')
            ->maxLength('rent', 10)
            ->allowEmpty('rent');

        $validator
            ->scalar('condominium')
            ->maxLength('condominium', 10)
            ->allowEmpty('condominium');

        $validator
            ->scalar('house_insurance')
            ->maxLength('house_insurance', 10)
            ->allowEmpty('house_insurance');

        $validator
            ->scalar('iptu')
            ->maxLength('iptu', 10)
            ->allowEmpty('iptu');

        $validator
            ->scalar('gas')
            ->maxLength('gas', 10)
            ->allowEmpty('gas');

        $validator
            ->scalar('light')
            ->maxLength('light', 10)
            ->allowEmpty('light');

        $validator
            ->scalar('services')
            ->maxLength('services', 10)
            ->allowEmpty('services');

        $validator
            ->scalar('tvsubscription')
            ->maxLength('tvsubscription', 10)
            ->allowEmpty('tvsubscription');

        $validator
            ->scalar('telephone_smartphone')
            ->maxLength('telephone_smartphone', 10)
            ->allowEmpty('telephone_smartphone');

        $validator
            ->scalar('installment_of_the_house')
            ->maxLength('installment_of_the_house', 10)
            ->allowEmpty('installment_of_the_house');

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
