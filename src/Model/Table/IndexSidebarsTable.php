<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IndexSidebars Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\CategorySidebarsTable|\Cake\ORM\Association\BelongsTo $CategorySidebars
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\IndexSidebar get($primaryKey, $options = [])
 * @method \App\Model\Entity\IndexSidebar newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IndexSidebar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IndexSidebar|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IndexSidebar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IndexSidebar[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IndexSidebar findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IndexSidebarsTable extends Table
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

        $this->setTable('index_sidebars');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'roles_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CategorySidebars', [
            'foreignKey' => 'category_sidebars_id',
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
            ->scalar('sidebar')
            ->maxLength('sidebar', 45)
            ->requirePresence('sidebar', 'create')
            ->notEmpty('sidebar');

        $validator
            ->scalar('icon')
            ->maxLength('icon', 45)
            ->allowEmpty('icon');

        $validator
            ->scalar('url')
            ->maxLength('url', 45)
            ->requirePresence('url', 'create')
            ->notEmpty('url');

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
        $rules->add($rules->existsIn(['roles_id'], 'Roles'));
        $rules->add($rules->existsIn(['category_sidebars_id'], 'CategorySidebars'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
