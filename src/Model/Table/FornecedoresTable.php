<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fornecedores Model
 *
 * @property \App\Model\Table\PlanocontasTable|\Cake\ORM\Association\BelongsTo $Planocontas
 * @property \App\Model\Table\EstadosTable|\Cake\ORM\Association\BelongsTo $Estados
 * @property \App\Model\Table\CidadesTable|\Cake\ORM\Association\BelongsTo $Cidades
 * @property \App\Model\Table\EmpresasTable|\Cake\ORM\Association\BelongsTo $Empresas
 *
 * @method \App\Model\Entity\Fornecedore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fornecedore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fornecedore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fornecedore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedore findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FornecedoresTable extends Table
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

        $this->setTable('fornecedores');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Planocontas', [
            'foreignKey' => 'planocontas_id'
        ]);
        $this->belongsTo('Estados', [
            'foreignKey' => 'estados_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cidades', [
            'foreignKey' => 'cidades_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresas_id',
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
            ->scalar('nome')
            ->maxLength('nome', 80)
            ->allowEmpty('nome');

        $validator
            ->scalar('razao_social')
            ->maxLength('razao_social', 80)
            ->allowEmpty('razao_social');

        $validator
            ->scalar('cnpj_cpf')
            ->maxLength('cnpj_cpf', 19)
            ->allowEmpty('cnpj_cpf');

        $validator
            ->scalar('ie')
            ->maxLength('ie', 20)
            ->allowEmpty('ie');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 80)
            ->allowEmpty('endereco');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 10)
            ->allowEmpty('numero');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 45)
            ->allowEmpty('bairro');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 20)
            ->allowEmpty('cep');

        $validator
            ->scalar('fone')
            ->maxLength('fone', 13)
            ->allowEmpty('fone');

        $validator
            ->scalar('fax')
            ->maxLength('fax', 13)
            ->allowEmpty('fax');

        $validator
            ->scalar('email_site')
            ->maxLength('email_site', 80)
            ->allowEmpty('email_site');

        $validator
            ->scalar('obs')
            ->maxLength('obs', 4294967295)
            ->allowEmpty('obs');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmpty('ativo');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 1)
            ->allowEmpty('tipo');

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
        $rules->add($rules->existsIn(['planocontas_id'], 'Planocontas'));
        $rules->add($rules->existsIn(['estados_id'], 'Estados'));
        $rules->add($rules->existsIn(['cidades_id'], 'Cidades'));
        $rules->add($rules->existsIn(['empresas_id'], 'Empresas'));

        return $rules;
    }
}
