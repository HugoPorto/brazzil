<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoresItemsDemands Model
 *
 * @property \App\Model\Table\StoresDemandsTable|\Cake\ORM\Association\BelongsTo $StoresDemands
 * @property \App\Model\Table\StoresProductsTable|\Cake\ORM\Association\BelongsTo $StoresProducts
 *
 * @method \App\Model\Entity\StoresItemsDemand get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoresItemsDemand newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoresItemsDemand[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoresItemsDemand|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoresItemsDemand patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoresItemsDemand[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoresItemsDemand findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoresItemsDemandsTable extends Table
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

        $this->setTable('stores_items_demands');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('StoresDemands', [
            'foreignKey' => 'stores_demands_id',
            'joinType' => 'INNER'
        ]);
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
            ->scalar('quantity')
            ->maxLength('quantity', 45)
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

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
        $rules->add($rules->existsIn(['stores_demands_id'], 'StoresDemands'));
        $rules->add($rules->existsIn(['stores_products_id'], 'StoresProducts'));

        return $rules;
    }
}
