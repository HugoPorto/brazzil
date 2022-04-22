<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Csts Model
 *
 * @method \App\Model\Entity\Cst get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cst newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cst[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cst|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cst patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cst[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cst findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CstsTable extends Table
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

        $this->setTable('csts');
        $this->setDisplayField('descricao');
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
            ->scalar('codigotributario')
            ->maxLength('codigotributario', 5)
            ->allowEmpty('codigotributario');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 120)
            ->allowEmpty('descricao');

        $validator
            ->numeric('icms')
            ->allowEmpty('icms');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmpty('ativo');

        return $validator;
    }
}
