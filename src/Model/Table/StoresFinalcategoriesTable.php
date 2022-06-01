<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoresFinalcategories Model
 *
 * @property \App\Model\Table\StoresSubcategoriesTable|\Cake\ORM\Association\BelongsTo $StoresSubcategories
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\StoresFinalcategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoresFinalcategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoresFinalcategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoresFinalcategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoresFinalcategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoresFinalcategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoresFinalcategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoresFinalcategoriesTable extends Table
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

        $this->setTable('stores_finalcategories');
        $this->setDisplayField('category');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('StoresSubcategories', [
            'foreignKey' => 'stores_subcategories_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
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
            ->scalar('category')
            ->maxLength('category', 150)
            ->requirePresence('category', 'create')
            ->notEmpty('category');

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
        $rules->add($rules->existsIn(['stores_subcategories_id'], 'StoresSubcategories'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
