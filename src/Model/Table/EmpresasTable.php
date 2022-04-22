<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 * @property \App\Model\Table\EstadosTable|\Cake\ORM\Association\BelongsTo $Estados
 * @property \App\Model\Table\CidadesTable|\Cake\ORM\Association\BelongsTo $Cidades
 *
 * @method \App\Model\Entity\Empresa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Empresa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Empresa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Empresa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmpresasTable extends Table
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

        $this->setTable('empresas');
        $this->setDisplayField('fantasia');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Estados', [
            'foreignKey' => 'estados_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cidades', [
            'foreignKey' => 'cidades_id',
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
            ->scalar('cnpj')
            ->maxLength('cnpj', 18)
            ->allowEmpty('cnpj');

        $validator
            ->scalar('ie')
            ->maxLength('ie', 15)
            ->allowEmpty('ie');

        $validator
            ->scalar('im')
            ->maxLength('im', 15)
            ->allowEmpty('im');

        $validator
            ->scalar('fantasia')
            ->maxLength('fantasia', 60)
            ->allowEmpty('fantasia');

        $validator
            ->scalar('razao_social')
            ->maxLength('razao_social', 60)
            ->allowEmpty('razao_social');

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
            ->maxLength('bairro', 20)
            ->allowEmpty('bairro');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 10)
            ->allowEmpty('cep');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 13)
            ->allowEmpty('telefone');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->numeric('juros_diario')
            ->allowEmpty('juros_diario');

        $validator
            ->numeric('multa')
            ->allowEmpty('multa');

        $validator
            ->scalar('crt')
            ->maxLength('crt', 3)
            ->allowEmpty('crt');

        $validator
            ->scalar('cnae')
            ->maxLength('cnae', 8)
            ->allowEmpty('cnae');

        $validator
            ->scalar('codigo_revenda')
            ->maxLength('codigo_revenda', 20)
            ->allowEmpty('codigo_revenda');

        $validator
            ->allowEmpty('logo');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 2)
            ->allowEmpty('ativo');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['estados_id'], 'Estados'));
        $rules->add($rules->existsIn(['cidades_id'], 'Cidades'));

        return $rules;
    }
}
