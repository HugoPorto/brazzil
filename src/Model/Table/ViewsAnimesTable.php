<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ViewsAnimes Model
 *
 * @property \App\Model\Table\AnimesTable|\Cake\ORM\Association\BelongsTo $Animes
 *
 * @method \App\Model\Entity\ViewsAnime get($primaryKey, $options = [])
 * @method \App\Model\Entity\ViewsAnime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ViewsAnime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ViewsAnime|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ViewsAnime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ViewsAnime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ViewsAnime findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ViewsAnimesTable extends Table
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

        $this->setTable('views_animes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Animes', [
            'foreignKey' => 'animes_id',
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
            ->integer('number_view')
            ->requirePresence('number_view', 'create')
            ->notEmpty('number_view');

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
        $rules->add($rules->existsIn(['animes_id'], 'Animes'));

        return $rules;
    }
}
