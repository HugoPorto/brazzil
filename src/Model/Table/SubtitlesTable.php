<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subtitles Model
 *
 * @method \App\Model\Entity\Subtitle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subtitle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Subtitle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subtitle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subtitle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subtitle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subtitle findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SubtitlesTable extends Table
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

        $this->setTable('subtitles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('subtitle')
            ->maxLength('subtitle', 85)
            ->requirePresence('subtitle', 'create')
            ->notEmpty('subtitle');

        return $validator;
    }
}
