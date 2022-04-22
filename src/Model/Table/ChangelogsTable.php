<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Changelogs Model
 *
 * @method \App\Model\Entity\Changelog get($primaryKey, $options = [])
 * @method \App\Model\Entity\Changelog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Changelog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Changelog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Changelog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Changelog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Changelog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChangelogsTable extends Table
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

        $this->setTable('changelogs');
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
            ->scalar('changelog')
            ->requirePresence('changelog', 'create')
            ->notEmpty('changelog');

        $validator
            ->scalar('icon')
            ->maxLength('icon', 65)
            ->allowEmpty('icon');

        return $validator;
    }
}
