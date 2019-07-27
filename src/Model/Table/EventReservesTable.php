<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EventReserves Model
 *
 * @method \App\Model\Entity\EventReserve get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventReserve newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EventReserve[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventReserve|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventReserve saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventReserve patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventReserve[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventReserve findOrCreate($search, callable $callback = null, $options = [])
 */
class EventReservesTable extends Table
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

        $this->setTable('event_reserves');
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
        return $rules;
    }
}
