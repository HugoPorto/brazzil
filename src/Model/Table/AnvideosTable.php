<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Anvideos Model
 *
 * @property \App\Model\Table\AnimesTable|\Cake\ORM\Association\BelongsTo $Animes
 * @property \App\Model\Table\SeansTable|\Cake\ORM\Association\BelongsTo $Seans
 *
 * @method \App\Model\Entity\Anvideo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Anvideo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Anvideo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Anvideo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anvideo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Anvideo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Anvideo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AnvideosTable extends Table
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

        $this->setTable('anvideos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Animes', [
            'foreignKey' => 'animes_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Seans', [
            'foreignKey' => 'seans_id',
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
            ->scalar('episode')
            ->maxLength('episode', 255)
            ->requirePresence('episode', 'create')
            ->notEmpty('episode');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmpty('description');

        $validator
            ->scalar('thumb')
            ->maxLength('thumb', 255)
            ->allowEmpty('thumb');

        $validator
            ->scalar('numepisode')
            ->maxLength('numepisode', 255)
            ->requirePresence('numepisode', 'create')
            ->notEmpty('numepisode');

        $validator
            ->scalar('embed')
            ->maxLength('embed', 4294967295)
            ->allowEmpty('embed');

        $validator
            ->scalar('embeddubbed')
            ->maxLength('embeddubbed', 4294967295)
            ->allowEmpty('embeddubbed');

        $validator
            ->scalar('embeddubbed2')
            ->maxLength('embeddubbed2', 4294967295)
            ->allowEmpty('embeddubbed2');

        $validator
            ->scalar('embeddubbed3')
            ->maxLength('embeddubbed3', 4294967295)
            ->allowEmpty('embeddubbed3');

        $validator
            ->scalar('embeddubbed4')
            ->maxLength('embeddubbed4', 4294967295)
            ->allowEmpty('embeddubbed4');

        $validator
            ->scalar('embed2')
            ->maxLength('embed2', 4294967295)
            ->allowEmpty('embed2');

        $validator
            ->scalar('embed3')
            ->maxLength('embed3', 4294967295)
            ->allowEmpty('embed3');

        $validator
            ->scalar('embed4')
            ->maxLength('embed4', 4294967295)
            ->allowEmpty('embed4');

        $validator
            ->scalar('link')
            ->maxLength('link', 4294967295)
            ->allowEmpty('link');

        $validator
            ->boolean('trend')
            ->allowEmpty('trend');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['animes_id'], 'Animes'));
        $rules->add($rules->existsIn(['seans_id'], 'Seans'));

        return $rules;
    }
}
