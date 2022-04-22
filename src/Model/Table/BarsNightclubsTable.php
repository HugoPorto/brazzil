<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BarsNightclubs Model
 *
 * @property \App\Model\Table\MounthsTable|\Cake\ORM\Association\BelongsTo $Mounths
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\BarsNightclub get($primaryKey, $options = [])
 * @method \App\Model\Entity\BarsNightclub newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BarsNightclub[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BarsNightclub|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BarsNightclub patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BarsNightclub[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BarsNightclub findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BarsNightclubsTable extends Table
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

        $this->setTable('bars_nightclubs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Mounths', [
            'foreignKey' => 'mounths_id',
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
            ->scalar('restaurants')
            ->maxLength('restaurants', 45)
            ->allowEmpty('restaurants');

        $validator
            ->scalar('cafes_ice_cream_shop')
            ->maxLength('cafes_ice_cream_shop', 45)
            ->allowEmpty('cafes_ice_cream_shop');

        $validator
            ->scalar('bars_nightclubs')
            ->maxLength('bars_nightclubs', 45)
            ->allowEmpty('bars_nightclubs');

        $validator
            ->scalar('bookstores')
            ->maxLength('bookstores', 45)
            ->allowEmpty('bookstores');

        $validator
            ->scalar('tickets')
            ->maxLength('tickets', 45)
            ->allowEmpty('tickets');

        $validator
            ->scalar('hotels')
            ->maxLength('hotels', 45)
            ->allowEmpty('hotels');

        $validator
            ->scalar('tours')
            ->maxLength('tours', 45)
            ->allowEmpty('tours');

        $validator
            ->scalar('others')
            ->maxLength('others', 45)
            ->allowEmpty('others');

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
        $rules->add($rules->existsIn(['mounths_id'], 'Mounths'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
