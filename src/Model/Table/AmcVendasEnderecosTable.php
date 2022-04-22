<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AmcVendasEnderecos Model
 *
 * @method \App\Model\Entity\AmcVendasEndereco get($primaryKey, $options = [])
 * @method \App\Model\Entity\AmcVendasEndereco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AmcVendasEndereco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AmcVendasEndereco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AmcVendasEndereco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AmcVendasEndereco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AmcVendasEndereco findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AmcVendasEnderecosTable extends Table
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

        $this->setTable('amc_vendas_enderecos');
        $this->setDisplayField('endereco');
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
            ->scalar('endereco')
            ->maxLength('endereco', 255)
            ->requirePresence('endereco', 'create')
            ->notEmpty('endereco');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 255)
            ->allowEmpty('bairro');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 150)
            ->allowEmpty('numero');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 150)
            ->allowEmpty('cep');

        return $validator;
    }
}
