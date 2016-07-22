<?php
namespace App\Model\Table;

use App\Model\Entity\Level;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Levels Model
 *
 * @property \Cake\ORM\Association\HasMany $Courses
 * @property \Cake\ORM\Association\HasMany $Remarks
 * @property \Cake\ORM\Association\HasMany $StudentResultPins
 * @property \Cake\ORM\Association\HasMany $Students
 */
class LevelsTable extends Table
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

        $this->table('levels');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Courses', [
            'foreignKey' => 'level_id'
        ]);
        $this->hasMany('Remarks', [
            'foreignKey' => 'level_id'
        ]);
        $this->hasMany('StudentResultPins', [
            'foreignKey' => 'level_id'
        ]);
        $this->hasMany('Students', [
            'foreignKey' => 'level_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
