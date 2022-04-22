<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Receipts Model
 *
 * @method \App\Model\Entity\Receipt get($primaryKey, $options = [])
 * @method \App\Model\Entity\Receipt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Receipt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Receipt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Receipt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Receipt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Receipt findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReceiptsTable extends Table
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

        $this->setTable('receipts');
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
            ->scalar('value')
            ->maxLength('value', 45)
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        $validator
            ->scalar('name_payer')
            ->maxLength('name_payer', 45)
            ->requirePresence('name_payer', 'create')
            ->notEmpty('name_payer');

        $validator
            ->scalar('cpf_cnpj_payer')
            ->maxLength('cpf_cnpj_payer', 45)
            ->allowEmpty('cpf_cnpj_payer');

        $validator
            ->scalar('regarding')
            ->maxLength('regarding', 4294967295)
            ->allowEmpty('regarding');

        $validator
            ->scalar('city')
            ->maxLength('city', 45)
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('issuer_name')
            ->maxLength('issuer_name', 45)
            ->allowEmpty('issuer_name');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 45)
            ->allowEmpty('phone');

        $validator
            ->scalar('cpf_cnpj_issuer')
            ->maxLength('cpf_cnpj_issuer', 45)
            ->allowEmpty('cpf_cnpj_issuer');

        return $validator;
    }
}
