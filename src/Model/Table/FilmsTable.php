<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Films Model
 *
 * @property \App\Model\Table\GenresTable|\Cake\ORM\Association\BelongsTo $Genres
 *
 * @method \App\Model\Entity\Film get($primaryKey, $options = [])
 * @method \App\Model\Entity\Film newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Film[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Film|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Film patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Film[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Film findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FilmsTable extends Table
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

        $this->setTable('films');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Genres', [
            'foreignKey' => 'genres_id',
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('linkimage')
            ->maxLength('linkimage', 4294967295)
            ->allowEmpty('linkimage');

        $validator
            ->scalar('launch')
            ->maxLength('launch', 150)
            ->allowEmpty('launch');

        $validator
            ->scalar('year')
            ->maxLength('year', 10)
            ->allowEmpty('year');

        $validator
            ->scalar('state')
            ->maxLength('state', 150)
            ->allowEmpty('state');

        $validator
            ->scalar('award')
            ->maxLength('award', 150)
            ->allowEmpty('award');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmpty('description');

        $validator
            ->scalar('trailer')
            ->maxLength('trailer', 4294967295)
            ->allowEmpty('trailer');

        $validator
            ->scalar('audio')
            ->maxLength('audio', 150)
            ->allowEmpty('audio');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 150)
            ->allowEmpty('duration');

        $validator
            ->scalar('quality')
            ->maxLength('quality', 85)
            ->allowEmpty('quality');

        $validator
            ->scalar('link')
            ->maxLength('link', 4294967295)
            ->allowEmpty('link');

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
            ->boolean('trend')
            ->allowEmpty('trend');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('views')
            ->allowEmpty('views');

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
        $rules->add($rules->existsIn(['genres_id'], 'Genres'));

        return $rules;
    }
}
