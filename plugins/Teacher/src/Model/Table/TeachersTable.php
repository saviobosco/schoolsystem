<?php
namespace Teacher\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Teachers Model
 *
 * @method \Teacher\Model\Entity\Teacher get($primaryKey, $options = [])
 * @method \Teacher\Model\Entity\Teacher newEntity($data = null, array $options = [])
 * @method \Teacher\Model\Entity\Teacher[] newEntities(array $data, array $options = [])
 * @method \Teacher\Model\Entity\Teacher|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Teacher\Model\Entity\Teacher patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Teacher\Model\Entity\Teacher[] patchEntities($entities, array $data, array $options = [])
 * @method \Teacher\Model\Entity\Teacher findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TeachersTable extends Table
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

        $this->table('teachers');
        $this->displayField('id');
        $this->primaryKey('id');

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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->allowEmpty('gender');

        $validator
            ->allowEmpty('state_of_origin');

        $validator
            ->allowEmpty('l_g_a');

        $validator
            ->allowEmpty('home_residence');

        $validator
            ->allowEmpty('phone_number');

        $validator
            ->allowEmpty('qualifications');


        return $validator;
    }
}
