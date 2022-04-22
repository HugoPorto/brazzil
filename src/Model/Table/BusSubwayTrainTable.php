<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusSubwayTrain Model
 *
 * @property \App\Model\Table\MounthsTable|\Cake\ORM\Association\BelongsTo $Mounths
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\BusSubwayTrain get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusSubwayTrain newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BusSubwayTrain[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusSubwayTrain|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusSubwayTrain patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusSubwayTrain[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusSubwayTrain findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BusSubwayTrainTable extends Table
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

        $this->setTable('bus_subway_train');
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
            ->scalar('bus_subway_train')
            ->maxLength('bus_subway_train', 45)
            ->allowEmpty('bus_subway_train');

        $validator
            ->scalar('taxi_uber')
            ->maxLength('taxi_uber', 45)
            ->allowEmpty('taxi_uber');

        $validator
            ->scalar('vehicle_installment')
            ->maxLength('vehicle_installment', 45)
            ->allowEmpty('vehicle_installment');

        $validator
            ->scalar('car_insurance')
            ->maxLength('car_insurance', 45)
            ->allowEmpty('car_insurance');

        $validator
            ->scalar('fuel')
            ->maxLength('fuel', 45)
            ->allowEmpty('fuel');

        $validator
            ->scalar('ipva_dpvat_licensing')
            ->maxLength('ipva_dpvat_licensing', 45)
            ->allowEmpty('ipva_dpvat_licensing');

        $validator
            ->scalar('mechanic')
            ->maxLength('mechanic', 45)
            ->allowEmpty('mechanic');

        $validator
            ->scalar('fines')
            ->maxLength('fines', 45)
            ->allowEmpty('fines');

        $validator
            ->scalar('parking')
            ->maxLength('parking', 45)
            ->allowEmpty('parking');

        $validator
            ->scalar('tolls')
            ->maxLength('tolls', 45)
            ->allowEmpty('tolls');

        $validator
            ->scalar('others_financing_consortium')
            ->maxLength('others_financing_consortium', 45)
            ->allowEmpty('others_financing_consortium');

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
