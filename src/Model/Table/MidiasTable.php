<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Midias Model
 *
 * @method \App\Model\Entity\Midia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Midia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Midia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Midia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Midia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Midia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Midia findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MidiasTable extends Table
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

        $this->setTable('midias');
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
            ->scalar('icon')
            ->maxLength('icon', 65)
            ->requirePresence('icon', 'create')
            ->notEmpty('icon');

        $validator
            ->scalar('link')
            ->maxLength('link', 65)
            ->allowEmpty('link');

        return $validator;
    }
}
