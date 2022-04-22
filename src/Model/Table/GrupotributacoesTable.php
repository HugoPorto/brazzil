<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Grupotributacoes Model
 *
 * @property \App\Model\Table\CstsTable|\Cake\ORM\Association\BelongsTo $Csts
 * @property \App\Model\Table\CfopsTable|\Cake\ORM\Association\BelongsTo $Cfops
 *
 * @method \App\Model\Entity\Grupotributaco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Grupotributaco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Grupotributaco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Grupotributaco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Grupotributaco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Grupotributaco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Grupotributaco findOrCreate($search, callable $callback = null, $options = [])
 */
class GrupotributacoesTable extends Table
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

        $this->setTable('grupotributacoes');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->belongsTo('Csts', [
            'foreignKey' => 'csts_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cfops', [
            'foreignKey' => 'cfops_id',
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
            ->maxLength('nome', 120)
            ->allowEmpty('nome');

        $validator
            ->scalar('origem')
            ->maxLength('origem', 4)
            ->allowEmpty('origem');

        $validator
            ->numeric('icms_saida_aliquota')
            ->allowEmpty('icms_saida_aliquota');

        $validator
            ->numeric('icms_saida_aliquota_red_base_calc')
            ->allowEmpty('icms_saida_aliquota_red_base_calc');

        $validator
            ->scalar('pis_saida')
            ->maxLength('pis_saida', 2)
            ->allowEmpty('pis_saida');

        $validator
            ->numeric('pis_saida_aliquota')
            ->allowEmpty('pis_saida_aliquota');

        $validator
            ->scalar('cofins_saida')
            ->maxLength('cofins_saida', 2)
            ->allowEmpty('cofins_saida');

        $validator
            ->numeric('cofins_saida_aliquota')
            ->allowEmpty('cofins_saida_aliquota');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
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
        $rules->add($rules->existsIn(['csts_id'], 'Csts'));
        $rules->add($rules->existsIn(['cfops_id'], 'Cfops'));

        return $rules;
    }
}
