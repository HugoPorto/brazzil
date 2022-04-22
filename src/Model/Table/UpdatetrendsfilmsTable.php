<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Updatetrendsfilms Model
 *
 * @method \App\Model\Entity\Updatetrendsfilm get($primaryKey, $options = [])
 * @method \App\Model\Entity\Updatetrendsfilm newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Updatetrendsfilm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Updatetrendsfilm|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Updatetrendsfilm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Updatetrendsfilm[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Updatetrendsfilm findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UpdatetrendsfilmsTable extends Table
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

        $this->setTable('updatetrendsfilms');
        $this->setDisplayField('id');
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
            ->integer('updatetrendsfilms')
            ->requirePresence('updatetrendsfilms', 'create')
            ->notEmpty('updatetrendsfilms');

        return $validator;
    }
}
