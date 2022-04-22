<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CryptoCoins Model
 *
 * @method \App\Model\Entity\CryptoCoin get($primaryKey, $options = [])
 * @method \App\Model\Entity\CryptoCoin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CryptoCoin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CryptoCoin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CryptoCoin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CryptoCoin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CryptoCoin findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CryptoCoinsTable extends Table
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

        $this->setTable('crypto_coins');
        $this->setDisplayField('coin');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('coin')
            ->maxLength('coin', 45)
            ->requirePresence('coin', 'create')
            ->notEmpty('coin');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->allowEmpty('photo');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->scalar('max_supply')
            ->maxLength('max_supply', 45)
            ->allowEmpty('max_supply');

        $validator
            ->scalar('total_supply')
            ->maxLength('total_supply', 255)
            ->allowEmpty('total_supply');

        $validator
            ->scalar('coinmarketcap')
            ->maxLength('coinmarketcap', 255)
            ->allowEmpty('coinmarketcap');

        $validator
            ->scalar('external_url_photo')
            ->maxLength('external_url_photo', 255)
            ->allowEmpty('external_url_photo');

        return $validator;
    }
}
