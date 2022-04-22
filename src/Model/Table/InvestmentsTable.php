<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Investments Model
 *
 * @property \App\Model\Table\MounthsTable|\Cake\ORM\Association\BelongsTo $Mounths
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Investment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Investment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Investment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Investment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Investment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Investment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Investment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InvestmentsTable extends Table
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

        $this->setTable('investments');
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
            ->scalar('actions')
            ->maxLength('actions', 10)
            ->allowEmpty('actions');

        $validator
            ->scalar('private_pension')
            ->maxLength('private_pension', 10)
            ->allowEmpty('private_pension');

        $validator
            ->scalar('cdbs_lcis_lcas')
            ->maxLength('cdbs_lcis_lcas', 10)
            ->allowEmpty('cdbs_lcis_lcas');

        $validator
            ->scalar('investment_funds')
            ->maxLength('investment_funds', 10)
            ->allowEmpty('investment_funds');

        $validator
            ->scalar('direct_treasure')
            ->maxLength('direct_treasure', 10)
            ->allowEmpty('direct_treasure');

        $validator
            ->scalar('loans')
            ->maxLength('loans', 10)
            ->allowEmpty('loans');

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
