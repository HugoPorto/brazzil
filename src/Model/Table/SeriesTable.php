<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Series Model
 *
 * @property \App\Model\Table\GenreseriesTable|\Cake\ORM\Association\BelongsTo $Genreseries
 * @property \App\Model\Table\SeanseriesTable|\Cake\ORM\Association\HasMany $Seanseries
 * @property \App\Model\Table\VideosseriesTable|\Cake\ORM\Association\HasMany $Videosseries
 *
 * @method \App\Model\Entity\Series get($primaryKey, $options = [])
 * @method \App\Model\Entity\Series newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Series[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Series|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Series patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Series[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Series findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SeriesTable extends Table
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

        $this->setTable('series');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Genreseries', [
            'foreignKey' => 'genreseries_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Seanseries', [
            'foreignKey' => 'series_id'
        ]);
        $this->hasMany('Videosseries', [
            'foreignKey' => 'series_id'
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
        $rules->add($rules->existsIn(['genreseries_id'], 'Genreseries'));

        return $rules;
    }
}
