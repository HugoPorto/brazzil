<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoresColors Model
 *
 * @property \App\Model\Table\StoresProductsTable|\Cake\ORM\Association\BelongsTo $StoresProducts
 *
 * @method \App\Model\Entity\StoresColor get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoresColor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoresColor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoresColor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoresColor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoresColor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoresColor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoresColorsTable extends Table
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

        $this->setTable('stores_colors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('StoresProducts', [
            'foreignKey' => 'stores_products_id'
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
            ->scalar('color')
            ->maxLength('color', 255)
            ->allowEmpty('color');

        $validator
            ->scalar('color2')
            ->maxLength('color2', 255)
            ->allowEmpty('color2');

        $validator
            ->scalar('color3')
            ->maxLength('color3', 255)
            ->allowEmpty('color3');

        $validator
            ->scalar('product_flag_code')
            ->maxLength('product_flag_code', 255)
            ->allowEmpty('product_flag_code');

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
        $rules->add($rules->existsIn(['stores_products_id'], 'StoresProducts'));

        return $rules;
    }
}
