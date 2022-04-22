<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Animevideos Model
 *
 * @property \App\Model\Table\AnimesTable|\Cake\ORM\Association\BelongsTo $Animes
 * @property \App\Model\Table\SeansTable|\Cake\ORM\Association\BelongsTo $Seans
 *
 * @method \App\Model\Entity\Animevideo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Animevideo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Animevideo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Animevideo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Animevideo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Animevideo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Animevideo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AnimevideosTable extends Table
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

        $this->setTable('animevideos');
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
            ->scalar('link')
            ->maxLength('link', 4294967295)
            ->allowEmpty('link');

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
