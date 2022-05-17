<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoresProducts Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\StoresCategoriesTable|\Cake\ORM\Association\BelongsTo $StoresCategories
 * @property \App\Model\Table\StoresColorsTable|\Cake\ORM\Association\BelongsTo $StoresColors
 *
 * @method \App\Model\Entity\StoresProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoresProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoresProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoresProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoresProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoresProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoresProduct findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoresProductsTable extends Table
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

        $this->setTable('stores_products');
        $this->setDisplayField('product');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StoresCategories', [
            'foreignKey' => 'stores_categories_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StoresColors', [
            'foreignKey' => 'stores_colors_id',
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
            ->scalar('product')
            ->maxLength('product', 45)
            ->requirePresence('product', 'create')
            ->notEmpty('product');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('price')
            ->maxLength('price', 20)
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 4294967295)
            ->requirePresence('photo', 'create')
            ->notEmpty('photo');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->boolean('online')
            ->requirePresence('online', 'create')
            ->notEmpty('online');

        $validator
            ->scalar('barcode')
            ->maxLength('barcode', 4294967295)
            ->allowEmpty('barcode');

        $validator
            ->scalar('qrcode')
            ->maxLength('qrcode', 4294967295)
            ->allowEmpty('qrcode');

        $validator
            ->scalar('barcode_code')
            ->maxLength('barcode_code', 255)
            ->allowEmpty('barcode_code');

        $validator
            ->scalar('weight')
            ->maxLength('weight', 11)
            ->requirePresence('weight', 'create')
            ->notEmpty('weight');

        $validator
            ->scalar('package_format')
            ->maxLength('package_format', 11)
            ->requirePresence('package_format', 'create')
            ->notEmpty('package_format');

        $validator
            ->scalar('package_lengths')
            ->maxLength('package_lengths', 11)
            ->requirePresence('package_lengths', 'create')
            ->notEmpty('package_lengths');

        $validator
            ->scalar('package_height')
            ->maxLength('package_height', 11)
            ->requirePresence('package_height', 'create')
            ->notEmpty('package_height');

        $validator
            ->scalar('package_width')
            ->maxLength('package_width', 11)
            ->requirePresence('package_width', 'create')
            ->notEmpty('package_width');

        $validator
            ->scalar('random_code')
            ->maxLength('random_code', 255)
            ->requirePresence('random_code', 'create')
            ->notEmpty('random_code');

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
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['stores_categories_id'], 'StoresCategories'));
        $rules->add($rules->existsIn(['stores_colors_id'], 'StoresColors'));

        return $rules;
    }
}
