<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coins Model
 *
 * @method \App\Model\Entity\Coin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Coin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coin findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoinsTable extends Table
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

        $this->setTable('coins');
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
            ->scalar('iconName')
            ->maxLength('iconName', 45)
            ->allowEmpty('iconName');

        $validator
            ->scalar('url')
            ->maxLength('url', 150)
            ->allowEmpty('url');

        return $validator;
    }
}
