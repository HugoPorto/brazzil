<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoursesDownloads Model
 *
 * @property \App\Model\Table\StoresCoursesTable|\Cake\ORM\Association\BelongsTo $StoresCourses
 * @property \App\Model\Table\StoresVideosTable|\Cake\ORM\Association\BelongsTo $StoresVideos
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CompanysTable|\Cake\ORM\Association\BelongsTo $Companys
 *
 * @method \App\Model\Entity\CoursesDownload get($primaryKey, $options = [])
 * @method \App\Model\Entity\CoursesDownload newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CoursesDownload[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CoursesDownload|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CoursesDownload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CoursesDownload[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CoursesDownload findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoursesDownloadsTable extends Table
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

        $this->setTable('courses_downloads');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('StoresCourses', [
            'foreignKey' => 'stores_courses_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StoresVideos', [
            'foreignKey' => 'stores_videos_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companys', [
            'foreignKey' => 'companys_id',
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
            ->scalar('link')
            ->maxLength('link', 255)
            ->requirePresence('link', 'create')
            ->notEmpty('link');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

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
        $rules->add($rules->existsIn(['stores_courses_id'], 'StoresCourses'));
        $rules->add($rules->existsIn(['stores_videos_id'], 'StoresVideos'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['companys_id'], 'Companys'));

        return $rules;
    }
}
