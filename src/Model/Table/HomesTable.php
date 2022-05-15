<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Homes Model
 *
 * @method \App\Model\Entity\Home get($primaryKey, $options = [])
 * @method \App\Model\Entity\Home newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Home[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Home|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Home patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Home[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Home findOrCreate($search, callable $callback = null, $options = [])
 */
class HomesTable extends Table
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

        $this->setTable('homes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('whatsapp_number')
            ->maxLength('whatsapp_number', 12)
            ->allowEmpty('whatsapp_number');

        $validator
            ->scalar('facebook_link')
            ->maxLength('facebook_link', 255)
            ->allowEmpty('facebook_link');

        $validator
            ->scalar('instagram_link')
            ->maxLength('instagram_link', 255)
            ->allowEmpty('instagram_link');

        return $validator;
    }
}
