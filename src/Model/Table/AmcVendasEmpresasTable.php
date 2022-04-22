<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AmcVendasEmpresas Model
 *
 * @property \App\Model\Table\AmcVendasEnderecosTable|\Cake\ORM\Association\BelongsTo $AmcVendasEnderecos
 *
 * @method \App\Model\Entity\AmcVendasEmpresa get($primaryKey, $options = [])
 * @method \App\Model\Entity\AmcVendasEmpresa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AmcVendasEmpresa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AmcVendasEmpresa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AmcVendasEmpresa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AmcVendasEmpresa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AmcVendasEmpresa findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AmcVendasEmpresasTable extends Table
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

        $this->setTable('amc_vendas_empresas');
        $this->setDisplayField('empresa');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AmcVendasEnderecos', [
            'foreignKey' => 'amc_vendas_enderecos_id',
            'joinType' => 'INNER'
        ]);
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
            ->scalar('empresa')
            ->maxLength('empresa', 150)
            ->requirePresence('empresa', 'create')
            ->notEmpty('empresa');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 20)
            ->allowEmpty('telefone');

        $validator
            ->scalar('celular')
            ->maxLength('celular', 20)
            ->allowEmpty('celular');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['amc_vendas_enderecos_id'], 'AmcVendasEnderecos'));

        return $rules;
    }
}
