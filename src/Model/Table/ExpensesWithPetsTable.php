<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExpensesWithPets Model
 *
 * @property \App\Model\Table\MounthsTable|\Cake\ORM\Association\BelongsTo $Mounths
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ExpensesWithPet get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExpensesWithPet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExpensesWithPet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExpensesWithPet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExpensesWithPet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExpensesWithPet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExpensesWithPet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExpensesWithPetsTable extends Table
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

        $this->setTable('expenses_with_pets');
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
            ->scalar('pet_shop')
            ->maxLength('pet_shop', 45)
            ->allowEmpty('pet_shop');

        $validator
            ->scalar('portion')
            ->maxLength('portion', 45)
            ->allowEmpty('portion');

        $validator
            ->scalar('veterinary')
            ->maxLength('veterinary', 45)
            ->allowEmpty('veterinary');

        $validator
            ->scalar('medicines')
            ->maxLength('medicines', 45)
            ->allowEmpty('medicines');

        $validator
            ->scalar('vaccines')
            ->maxLength('vaccines', 45)
            ->allowEmpty('vaccines');

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
