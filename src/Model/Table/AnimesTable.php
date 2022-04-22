<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Animes Model
 *
 * @method \App\Model\Entity\Anime get($primaryKey, $options = [])
 * @method \App\Model\Entity\Anime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Anime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Anime|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Anime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Anime findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AnimesTable extends Table
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

        $this->setTable('animes');
        $this->setDisplayField('anime');
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
            ->scalar('anime')
            ->maxLength('anime', 64)
            ->requirePresence('anime', 'create')
            ->notEmpty('anime');

        $validator
            ->scalar('linkimage')
            ->maxLength('linkimage', 4294967295)
            ->allowEmpty('linkimage');

        $validator
            ->scalar('trailer')
            ->allowEmpty('trailer');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->scalar('launch')
            ->maxLength('launch', 50)
            ->allowEmpty('launch');

        $validator
            ->scalar('advertising')
            ->allowEmpty('advertising');

        $validator
            ->scalar('sponsor')
            ->allowEmpty('sponsor');

        $validator
            ->boolean('trend')
            ->requirePresence('trend', 'create')
            ->notEmpty('trend');

        $validator
            ->integer('views')
            ->allowEmpty('views');

        return $validator;
    }
}
