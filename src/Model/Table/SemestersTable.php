<?php
namespace App\Model\Table;

use App\Model\Entity\Semester;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Semesters Model
 *
 * @property \Cake\ORM\Association\HasMany $Courses
 * @property \Cake\ORM\Association\HasMany $StudentsCourses
 */
class SemestersTable extends Table
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

        $this->table('semesters');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Courses', [
            'foreignKey' => 'semester_id'
        ]);
        $this->hasMany('StudentsCourses', [
            'foreignKey' => 'semester_id'
        ]);

        $this->HasOne('Remarks',[
            'className' => 'Remarks',
            'foreignKey' => 'semester_id'
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
