<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mounths Model
 *
 * @method \App\Model\Entity\Mounth get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mounth newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mounth[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mounth|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mounth patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mounth[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mounth findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MounthsTable extends Table
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

        $this->setTable('mounths');
        $this->setDisplayField('mounth');
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
            ->scalar('mounth')
            ->maxLength('mounth', 45)
            ->requirePresence('mounth', 'create')
            ->notEmpty('mounth');

        return $validator;
    }
}
