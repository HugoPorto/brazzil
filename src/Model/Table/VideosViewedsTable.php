<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VideosVieweds Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\StoresCoursesTable|\Cake\ORM\Association\BelongsTo $StoresCourses
 * @property \App\Model\Table\StoresVideosTable|\Cake\ORM\Association\BelongsTo $StoresVideos
 *
 * @method \App\Model\Entity\VideosViewed get($primaryKey, $options = [])
 * @method \App\Model\Entity\VideosViewed newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VideosViewed[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VideosViewed|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VideosViewed patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VideosViewed[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VideosViewed findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VideosViewedsTable extends Table
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

        $this->setTable('videos_vieweds');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StoresCourses', [
            'foreignKey' => 'stores_courses_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StoresVideos', [
            'foreignKey' => 'stores_videos_id',
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
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['stores_courses_id'], 'StoresCourses'));
        $rules->add($rules->existsIn(['stores_videos_id'], 'StoresVideos'));

        return $rules;
    }
}
