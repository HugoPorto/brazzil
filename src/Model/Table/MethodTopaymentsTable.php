<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MethodTopayments Model
 *
 * @method \App\Model\Entity\MethodTopayment get($primaryKey, $options = [])
 * @method \App\Model\Entity\MethodTopayment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MethodTopayment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MethodTopayment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MethodTopayment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MethodTopayment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MethodTopayment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MethodTopaymentsTable extends Table
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

        $this->setTable('method_topayments');
        $this->setDisplayField('method');
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
            ->scalar('method')
            ->maxLength('method', 150)
            ->requirePresence('method', 'create')
            ->notEmpty('method');

        return $validator;
    }
}
