<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tablestubex Model
 *
 * @method \App\Model\Entity\Tablestubex get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tablestubex newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tablestubex[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tablestubex|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tablestubex patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tablestubex[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tablestubex findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TablestubexTable extends Table
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

        $this->setTable('tablestubex');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->maxLength('title', 150)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('text')
            ->maxLength('text', 255)
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->scalar('link')
            ->maxLength('link', 150)
            ->requirePresence('link', 'create')
            ->notEmpty('link');

        return $validator;
    }
}
