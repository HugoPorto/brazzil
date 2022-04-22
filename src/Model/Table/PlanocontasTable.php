<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Planocontas Model
 *
 * @property \App\Model\Table\CentroresultadosTable|\Cake\ORM\Association\BelongsTo $Centroresultados
 *
 * @method \App\Model\Entity\Planoconta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Planoconta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Planoconta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Planoconta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Planoconta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Planoconta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Planoconta findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PlanocontasTable extends Table
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

        $this->setTable('planocontas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Centroresultados', [
            'foreignKey' => 'centroresultado_id',
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
            ->scalar('codigo')
            ->maxLength('codigo', 45)
            ->allowEmpty('codigo');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 45)
            ->allowEmpty('nome');

        $validator
            ->scalar('tipo_conta')
            ->maxLength('tipo_conta', 45)
            ->allowEmpty('tipo_conta');

        $validator
            ->scalar('categoria_conta')
            ->maxLength('categoria_conta', 45)
            ->allowEmpty('categoria_conta');

        $validator
            ->scalar('modo_conta')
            ->maxLength('modo_conta', 45)
            ->allowEmpty('modo_conta');

        $validator
            ->scalar('ordem')
            ->maxLength('ordem', 45)
            ->allowEmpty('ordem');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 45)
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
        $rules->add($rules->existsIn(['centroresultado_id'], 'Centroresultados'));

        return $rules;
    }
}
