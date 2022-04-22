<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Galerys Model
 *
 * @method \App\Model\Entity\Galery get($primaryKey, $options = [])
 * @method \App\Model\Entity\Galery newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Galery[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Galery|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Galery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Galery[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Galery findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GalerysTable extends Table
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

        $this->setTable('galerys');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ImageProfiles', [
            'dependent' => true,
            'cascadeCallbacks' => true,
            'foreignKey' => 'galerys_id'
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
            ->scalar('title')
            ->maxLength('title', 65)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        return $validator;
    }
}
