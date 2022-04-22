<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Linkcoins Model
 *
 * @property \App\Model\Table\CoinsTable|\Cake\ORM\Association\BelongsTo $Coins
 *
 * @method \App\Model\Entity\Linkcoin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Linkcoin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Linkcoin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Linkcoin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Linkcoin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Linkcoin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Linkcoin findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LinkcoinsTable extends Table
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

        $this->setTable('linkcoins');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Coins', [
            'foreignKey' => 'coins_id',
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
            ->allowEmpty('link');

        $validator
            ->requirePresence('main', 'create')
            ->notEmpty('main');

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
        $rules->add($rules->existsIn(['coins_id'], 'Coins'));

        return $rules;
    }
}
