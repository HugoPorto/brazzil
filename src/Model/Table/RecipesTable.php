<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recipes Model
 *
 * @property \App\Model\Table\MounthsTable|\Cake\ORM\Association\BelongsTo $Mounths
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Recipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recipe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Recipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recipe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RecipesTable extends Table
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

        $this->setTable('recipes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Mounths', [
            'foreignKey' => 'mounths_id'
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
            ->scalar('salarys')
            ->maxLength('salarys', 10)
            ->allowEmpty('salarys');

        $validator
            ->scalar('rentals')
            ->maxLength('rentals', 10)
            ->allowEmpty('rentals');

        $validator
            ->scalar('prolabores')
            ->maxLength('prolabores', 10)
            ->allowEmpty('prolabores');

        $validator
            ->scalar('other_fixed_revenues')
            ->maxLength('other_fixed_revenues', 10)
            ->allowEmpty('other_fixed_revenues');

        $validator
            ->scalar('dividends')
            ->maxLength('dividends', 10)
            ->allowEmpty('dividends');

        $validator
            ->scalar('commissions')
            ->maxLength('commissions', 10)
            ->allowEmpty('commissions');

        $validator
            ->scalar('thirteen_salarys')
            ->maxLength('thirteen_salarys', 10)
            ->allowEmpty('thirteen_salarys');

        $validator
            ->scalar('bonus')
            ->maxLength('bonus', 10)
            ->allowEmpty('bonus');

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
