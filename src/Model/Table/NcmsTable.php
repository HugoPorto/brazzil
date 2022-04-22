<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ncms Model
 *
 * @method \App\Model\Entity\Ncm get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ncm newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ncm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ncm|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ncm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ncm[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ncm findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NcmsTable extends Table
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

        $this->setTable('ncms');
        $this->setDisplayField('codigo');
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
            ->scalar('codigo')
            ->maxLength('codigo', 10)
            ->allowEmpty('codigo');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 4294967295)
            ->allowEmpty('descricao');

        $validator
            ->numeric('aliquota_nacional')
            ->allowEmpty('aliquota_nacional');

        $validator
            ->numeric('aliquota_internacional')
            ->allowEmpty('aliquota_internacional');

        $validator
            ->numeric('aliquota_estadual')
            ->allowEmpty('aliquota_estadual');

        $validator
            ->numeric('aliquota_municipal')
            ->allowEmpty('aliquota_municipal');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 2)
            ->allowEmpty('ativo');

        return $validator;
    }
}
