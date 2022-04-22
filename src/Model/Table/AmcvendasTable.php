<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Amcvendas Model
 *
 * @property \App\Model\Table\AmcVendasEmpresasTable|\Cake\ORM\Association\BelongsTo $AmcVendasEmpresas
 *
 * @method \App\Model\Entity\Amcvenda get($primaryKey, $options = [])
 * @method \App\Model\Entity\Amcvenda newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Amcvenda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Amcvenda|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Amcvenda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Amcvenda[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Amcvenda findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AmcvendasTable extends Table
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

        $this->setTable('amcvendas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AmcVendasEmpresas', [
            'foreignKey' => 'amc_vendas_empresas_id',
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
            ->maxLength('nome', 45)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->scalar('usuario')
            ->maxLength('usuario', 45)
            ->requirePresence('usuario', 'create')
            ->notEmpty('usuario');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('senha')
            ->maxLength('senha', 15)
            ->requirePresence('senha', 'create')
            ->notEmpty('senha');

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
        $rules->add($rules->existsIn(['amc_vendas_empresas_id'], 'AmcVendasEmpresas'));

        return $rules;
    }
}
