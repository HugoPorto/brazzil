<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cfops Model
 *
 * @method \App\Model\Entity\Cfop get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cfop newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cfop[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cfop|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cfop patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cfop[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cfop findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CfopsTable extends Table
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

        $this->setTable('cfops');
        $this->setDisplayField('codigocfop');
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
            ->scalar('codigocfop')
            ->maxLength('codigocfop', 5)
            ->allowEmpty('codigocfop');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 4294967295)
            ->allowEmpty('descricao');

        $validator
            ->scalar('aplicacao')
            ->maxLength('aplicacao', 4294967295)
            ->allowEmpty('aplicacao');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 2)
            ->allowEmpty('ativo');

        return $validator;
    }
}
