<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MyCoins Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CryptoCoinsTable|\Cake\ORM\Association\BelongsTo $CryptoCoins
 *
 * @method \App\Model\Entity\MyCoin get($primaryKey, $options = [])
 * @method \App\Model\Entity\MyCoin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MyCoin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MyCoin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MyCoin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MyCoin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MyCoin findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MyCoinsTable extends Table
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

        $this->setTable('my_coins');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CryptoCoins', [
            'foreignKey' => 'crypto_coins_id',
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
            ->scalar('amount_of_currency')
            ->maxLength('amount_of_currency', 45)
            ->requirePresence('amount_of_currency', 'create')
            ->notEmpty('amount_of_currency');

        $validator
            ->scalar('amount_of_currency_in_money')
            ->maxLength('amount_of_currency_in_money', 45)
            ->requirePresence('amount_of_currency_in_money', 'create')
            ->notEmpty('amount_of_currency_in_money');

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
        $rules->add($rules->existsIn(['crypto_coins_id'], 'CryptoCoins'));

        return $rules;
    }
}
