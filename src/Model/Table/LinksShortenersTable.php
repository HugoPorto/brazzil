<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LinksShorteners Model
 *
 * @property \App\Model\Table\ShortenersTable|\Cake\ORM\Association\BelongsTo $Shorteners
 * @property \App\Model\Table\VideosTable|\Cake\ORM\Association\BelongsTo $Videos
 *
 * @method \App\Model\Entity\LinksShortener get($primaryKey, $options = [])
 * @method \App\Model\Entity\LinksShortener newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LinksShortener[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LinksShortener|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LinksShortener patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LinksShortener[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LinksShortener findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LinksShortenersTable extends Table
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

        $this->setTable('links_shorteners');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Shorteners', [
            'foreignKey' => 'shorteners_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Videos', [
            'foreignKey' => 'videos_id',
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
            ->requirePresence('link', 'create')
            ->notEmpty('link');

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
        $rules->add($rules->existsIn(['shorteners_id'], 'Shorteners'));
        $rules->add($rules->existsIn(['videos_id'], 'Videos'));
        $rules->add($rules->isUnique(['videos_id']));

        return $rules;
    }
}
