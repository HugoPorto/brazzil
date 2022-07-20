<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoresLogos Model
 *
 * @method \App\Model\Entity\StoresLogo get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoresLogo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoresLogo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoresLogo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoresLogo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoresLogo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoresLogo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoresLogosTable extends Table
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

        $this->setTable('stores_logos');
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
            ->scalar('logo')
            ->maxLength('logo', 4294967295)
            ->requirePresence('logo', 'create')
            ->notEmpty('logo');

        return $validator;
    }
}
