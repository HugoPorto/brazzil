<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoresPages Model
 *
 * @method \App\Model\Entity\StoresPage get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoresPage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoresPage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoresPage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoresPage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoresPage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoresPage findOrCreate($search, callable $callback = null, $options = [])
 */
class StoresPagesTable extends Table
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

        $this->setTable('stores_pages');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->maxLength('title', 45)
            ->allowEmpty('title');

        $validator
            ->scalar('logo')
            ->maxLength('logo', 255)
            ->allowEmpty('logo');

        $validator
            ->scalar('about')
            ->maxLength('about', 4294967295)
            ->allowEmpty('about');

        $validator
            ->scalar('mission')
            ->maxLength('mission', 4294967295)
            ->allowEmpty('mission');

        $validator
            ->scalar('about_title')
            ->maxLength('about_title', 45)
            ->allowEmpty('about_title');

        $validator
            ->scalar('about_subtitle')
            ->maxLength('about_subtitle', 4294967295)
            ->allowEmpty('about_subtitle');

        $validator
            ->scalar('team_title')
            ->maxLength('team_title', 45)
            ->allowEmpty('team_title');

        $validator
            ->scalar('team_subtitle')
            ->maxLength('team_subtitle', 4294967295)
            ->allowEmpty('team_subtitle');

        $validator
            ->scalar('contact_title')
            ->maxLength('contact_title', 45)
            ->allowEmpty('contact_title');

        $validator
            ->scalar('contact_subtitle')
            ->maxLength('contact_subtitle', 4294967295)
            ->allowEmpty('contact_subtitle');

        $validator
            ->scalar('price_title')
            ->maxLength('price_title', 45)
            ->allowEmpty('price_title');

        $validator
            ->scalar('price_subtitle')
            ->maxLength('price_subtitle', 4294967295)
            ->allowEmpty('price_subtitle');

        return $validator;
    }
}
