<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MyEnvironments Model
 *
 * @method \App\Model\Entity\MyEnvironment get($primaryKey, $options = [])
 * @method \App\Model\Entity\MyEnvironment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MyEnvironment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MyEnvironment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MyEnvironment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MyEnvironment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MyEnvironment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MyEnvironmentsTable extends Table
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

        $this->setTable('my_environments');
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
            ->scalar('environment')
            ->maxLength('environment', 45)
            ->requirePresence('environment', 'create')
            ->notEmpty('environment');

        return $validator;
    }
}
