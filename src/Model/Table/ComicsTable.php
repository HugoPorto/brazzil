<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comics Model
 *
 * @property \App\Model\Table\MagazinesTable|\Cake\ORM\Association\BelongsTo $Magazines
 *
 * @method \App\Model\Entity\Comic get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comic newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Comic[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comic|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comic[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comic findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ComicsTable extends Table
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

        $this->setTable('comics');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Magazines', [
            'foreignKey' => 'magazines_id',
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
            ->scalar('comic')
            ->maxLength('comic', 255)
            ->requirePresence('comic', 'create')
            ->notEmpty('comic');

        $validator
            ->scalar('autor')
            ->maxLength('autor', 150)
            ->requirePresence('autor', 'create')
            ->notEmpty('autor');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->scalar('categories')
            ->maxLength('categories', 255)
            ->allowEmpty('categories');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmpty('description');

        $validator
            ->scalar('chapters')
            ->maxLength('chapters', 45)
            ->allowEmpty('chapters');

        $validator
            ->scalar('thumb')
            ->maxLength('thumb', 255)
            ->allowEmpty('thumb');

        $validator
            ->scalar('embed')
            ->maxLength('embed', 4294967295)
            ->allowEmpty('embed');

        $validator
            ->scalar('embeddubbed')
            ->maxLength('embeddubbed', 4294967295)
            ->allowEmpty('embeddubbed');

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
        $rules->add($rules->existsIn(['magazines_id'], 'Magazines'));

        return $rules;
    }
}
