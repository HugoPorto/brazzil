<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fabricantes Model
 *
 * @method \App\Model\Entity\Fabricante get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fabricante newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fabricante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fabricante|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fabricante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fabricante[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fabricante findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FabricantesTable extends Table
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

        $this->setTable('fabricantes');
        $this->setDisplayField('nome');
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
            ->scalar('nome')
            ->maxLength('nome', 80)
            ->allowEmpty('nome');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmpty('ativo');

        return $validator;
    }
}
