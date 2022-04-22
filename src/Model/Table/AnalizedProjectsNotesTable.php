<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AnalizedProjectsNotes Model
 *
 * @property \App\Model\Table\AnalizedProjectsTable|\Cake\ORM\Association\BelongsTo $AnalizedProjects
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\AnalizedProjectsNote get($primaryKey, $options = [])
 * @method \App\Model\Entity\AnalizedProjectsNote newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AnalizedProjectsNote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AnalizedProjectsNote|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AnalizedProjectsNote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AnalizedProjectsNote[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AnalizedProjectsNote findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AnalizedProjectsNotesTable extends Table
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

        $this->setTable('analized_projects_notes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AnalizedProjects', [
            'foreignKey' => 'analized_projects_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
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
            ->scalar('note')
            ->maxLength('note', 4294967295)
            ->requirePresence('note', 'create')
            ->notEmpty('note');

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
        $rules->add($rules->existsIn(['analized_projects_id'], 'AnalizedProjects'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
