<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cests Model
 *
 * @method \App\Model\Entity\Cest get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cest findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CestsTable extends Table
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

        $this->setTable('cests');
        $this->setDisplayField('descricao');
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
            ->scalar('cest')
            ->maxLength('cest', 9)
            ->allowEmpty('cest');

        $validator
            ->scalar('ncm')
            ->maxLength('ncm', 9)
            ->allowEmpty('ncm');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 150)
            ->allowEmpty('descricao');

        return $validator;
    }
}
