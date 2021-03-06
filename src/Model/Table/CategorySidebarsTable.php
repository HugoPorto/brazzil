<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategorySidebars Model
 *
 * @method \App\Model\Entity\CategorySidebar get($primaryKey, $options = [])
 * @method \App\Model\Entity\CategorySidebar newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CategorySidebar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CategorySidebar|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CategorySidebar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CategorySidebar[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CategorySidebar findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CategorySidebarsTable extends Table
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

        $this->setTable('category_sidebars');
        $this->setDisplayField('category');
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
            ->scalar('category')
            ->maxLength('category', 45)
            ->requirePresence('category', 'create')
            ->notEmpty('category');

        return $validator;
    }
}
