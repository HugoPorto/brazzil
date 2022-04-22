<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Centroresultados Model
 *
 * @method \App\Model\Entity\Centroresultado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Centroresultado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Centroresultado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Centroresultado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centroresultado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Centroresultado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Centroresultado findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CentroresultadosTable extends Table
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

        $this->setTable('centroresultados');
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
            ->scalar('descricao')
            ->maxLength('descricao', 45)
            ->allowEmpty('descricao');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 45)
            ->allowEmpty('ativo');

        return $validator;
    }
}
