<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shorteners Model
 *
 * @method \App\Model\Entity\Shortener get($primaryKey, $options = [])
 * @method \App\Model\Entity\Shortener newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Shortener[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shortener|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shortener patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Shortener[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shortener findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ShortenersTable extends Table
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

        $this->setTable('shorteners');
        $this->setDisplayField('shortener');
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
            ->scalar('shortener')
            ->maxLength('shortener', 85)
            ->requirePresence('shortener', 'create')
            ->notEmpty('shortener');

        $validator
            ->scalar('site')
            ->maxLength('site', 185)
            ->requirePresence('site', 'create')
            ->notEmpty('site');

        return $validator;
    }
}
