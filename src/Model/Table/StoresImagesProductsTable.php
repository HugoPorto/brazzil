<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoresImagesProducts Model
 *
 * @property \App\Model\Table\StoresProductsTable|\Cake\ORM\Association\BelongsTo $StoresProducts
 *
 * @method \App\Model\Entity\StoresImagesProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoresImagesProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoresImagesProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoresImagesProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoresImagesProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoresImagesProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoresImagesProduct findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoresImagesProductsTable extends Table
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

        $this->setTable('stores_images_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('StoresProducts', [
            'foreignKey' => 'stores_products_id',
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
            ->scalar('photo')
            ->maxLength('photo', 4294967295)
            ->requirePresence('photo', 'create')
            ->notEmpty('photo');

        $validator
            ->scalar('reference')
            ->maxLength('reference', 6)
            ->requirePresence('reference', 'create')
            ->notEmpty('reference');

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
