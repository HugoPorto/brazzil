<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MypreciousTitles Model
 *
 * @method \App\Model\Entity\MypreciousTitle get($primaryKey, $options = [])
 * @method \App\Model\Entity\MypreciousTitle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MypreciousTitle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MypreciousTitle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MypreciousTitle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MypreciousTitle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MypreciousTitle findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MypreciousTitlesTable extends Table
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

        $this->setTable('myprecious_titles');
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
            ->scalar('page')
            ->maxLength('page', 45)
            ->requirePresence('page', 'create')
            ->notEmpty('page');

        return $validator;
    }
}
