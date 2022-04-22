<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Publicitys Model
 *
 * @method \App\Model\Entity\Publicity get($primaryKey, $options = [])
 * @method \App\Model\Entity\Publicity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Publicity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Publicity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Publicity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Publicity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Publicity findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PublicitysTable extends Table
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

        $this->setTable('publicitys');
        $this->setDisplayField('business');
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
            ->scalar('business')
            ->maxLength('business', 65)
            ->requirePresence('business', 'create')
            ->notEmpty('business');

        $validator
            ->scalar('link')
            ->maxLength('link', 150)
            ->requirePresence('link', 'create')
            ->notEmpty('link');

        $validator
            ->scalar('embed1')
            ->requirePresence('embed1', 'create')
            ->notEmpty('embed1');

        $validator
            ->scalar('embed2')
            ->allowEmpty('embed2');

        $validator
            ->scalar('embed3')
            ->allowEmpty('embed3');

        return $validator;
    }
}
