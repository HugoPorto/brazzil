<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Defis Model
 *
 * @method \App\Model\Entity\Defi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Defi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Defi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Defi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Defi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Defi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Defi findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DefisTable extends Table
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

        $this->setTable('defis');
        $this->setDisplayField('defi');
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
            ->scalar('defi')
            ->maxLength('defi', 60)
            ->requirePresence('defi', 'create')
            ->notEmpty('defi');

        $validator
            ->scalar('whitepaper')
            ->maxLength('whitepaper', 255)
            ->requirePresence('whitepaper', 'create')
            ->notEmpty('whitepaper');

        $validator
            ->scalar('site')
            ->maxLength('site', 255)
            ->requirePresence('site', 'create')
            ->notEmpty('site');

        $validator
            ->scalar('code')
            ->maxLength('code', 45)
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->scalar('search')
            ->maxLength('search', 45)
            ->requirePresence('search', 'create')
            ->notEmpty('search');

        $validator
            ->scalar('coinmarketcap')
            ->maxLength('coinmarketcap', 255)
            ->requirePresence('coinmarketcap', 'create')
            ->notEmpty('coinmarketcap');

        return $validator;
    }
}
