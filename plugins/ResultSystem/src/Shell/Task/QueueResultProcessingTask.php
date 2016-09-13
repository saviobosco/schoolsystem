<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/3/16
 * Time: 10:06 PM
 */

namespace ResultSystem\Shell\Task;


use Cake\I18n\Number;
use Cake\ORM\TableRegistry;
use Queue\Shell\Task\QueueTask;

class QueueResultProcessingTask extends QueueTask
{
    /**
     * @var \Queue\Model\Table\QueuedTasksTable
     */
    public $QueuedTask;

    /**
     * Timeout for run, after which the Task is reassigned to a new worker.
     *
     * @var int
     */
    public $timeout = 10;

    /**
     * Number of times a failed instance of this task should be restarted before giving up.
     *
     * @var int
     */
    public $retries = 1;

    /**
     * Stores any failure messages triggered during run()
     *
     * @var string
     */
    public $failureMessage = '';

    /**
     * Example add functionality.
     * Will create one example job in the queue, which later will be executed using run();
     *
     * @return void
     */
    public function add() {
        $this->out('Result System Queue ResultSystem.');
        $this->hr();
        $this->out('This will process all the results .');
        $this->out('based on the parameters given to it ');
        $this->out('The parameters are ');
        $this->out('the class_id , term_id , session_id');
        $this->out(' ');
        $this->out('You can find the sourcecode of this task in: ');
        $this->out(__FILE__);
        $this->out(' ');
        /*
         * Adding a task of type 'example' with no additionally passed data
         */
        if ($this->QueuedTasks->createJob('ResultProcessing',['class_id'=>1,'term_id'=>1,'session_id' =>1] )) {
            $this->out('OK, job created, now run the worker');
        } else {
            $this->err('Could not create Job');
        }
    }

    public function run($data , $id = null)
    {
        //$this->out('class_id'.$data['class_id'] .' term_id '.$data['term_id'] .' session_id '.$data['session_id']);
        if (isset($data['term_id'])) {

            $this->calculateTermlyTotals($data['class_id'],$data['term_id'],$data['session_id']);
            $this->calculateTermlyPosition($data['class_id'],$data['term_id'],$data['session_id']);
            $this->calculateStudentTermlySubjectPosition($data['class_id'],$data['term_id'],$data['session_id']);
            $this->calculateTermlyPositionBasedOnClassDemacation($data['class_id'],$data['term_id'],$data['session_id']);
            $this->calculateTermlySubjectPostionOnClassDemacation($data['class_id'],$data['term_id'],$data['session_id']);

        }
        //$this->calculateAnnualTotals($data['class_id'],$data['session_id']);
        //$this->inputTotalInAnnualPositionTable($data['class_id'],$data['session_id']);
        //$this->calculateStudentAnnualSubjectPosition($data['class_id'],$data['session_id']);
        //$this->calculateAnnualPositionBasedOnClassDemacation($data['class_id'],$data['session_id']);
        //$this->calculateAnnualSubjectPostionOnClassDemacation($data['class_id'],$data['session_id']);
        return true;

    }

    /**
     * @param $value
     * @return int|string
     * The precision function is used to determine the decimal precision
     * of a Number eg . 70.555666 converted to 70.55.
     * This function uses the Number::precision static method .
      */
    protected function _determineNumberPrecision($value)
    {
        if ( !is_float($value) ) {
            return (int)$value;
        }

        return Number::precision($value,2);
    }

    public function calculateTermlyTotals($class_id,$term_id,$session_id)
    {
        // Initializes the All required tables
        $studentTable = TableRegistry::get('App.Students')->find('all');
        $termlyResultTable = TableRegistry::get('StudentTermlyResults');
        $termlyPositionTable = TableRegistry::get('StudentTermlyPositions');

        $students = $studentTable->where(['class_id' => $class_id ,'session_id'=>$session_id])->toArray();

        // iterates through the Array sets
        foreach ($students as $student ) {
            // gets the student subject
            $subjects = $termlyResultTable->find('all')->where(['student_id'=>$student->id,
                                                                'class_id'=>$class_id,
                                                                'term_id' => $term_id,
                                                                'session_id' => $session_id
            ])->toArray();
            // gets the subject count used for average calculation
            $subjectCount = count($subjects);

            // initializes the sum variable .
            $sum = 0 ;
            for ($num = 0; $num < $subjectCount ; $num++ ) {
                $sum += $subjects[$num]['total'] ;
            }
            // Calculating average
            $average = $this->_determineNumberPrecision($sum / $subjectCount ) ;

            // check to know if the record already exists in the table .
            $studentTotal = $termlyPositionTable->find('all')->where(['student_id' => $student->id,
                                                                      'class_id' => $class_id,
                                                                      'term_id' => $term_id,
                                                                      'session_id' => $session_id
            ])->first();

            if ($studentTotal == null ) {
                $studentTotal = $termlyPositionTable->newEntity(['student_id' => $student->id,
                                                                'total' => $sum ,
                                                                'average' => $average,
                                                                'class_id' => $class_id,
                                                                'term_id' => $term_id,
                                                                'session_id' => $session_id]);
            } else {

                $newData = ['student_id' => $student->id,
                            'total' => $sum ,
                            'average' => $average,
                            'class_id' => $class_id,
                            'term_id' => $term_id,
                            'session_id' => $session_id];

            $studentTotal = $termlyPositionTable->patchEntity($studentTotal,$newData);
            }


            if ($termlyPositionTable->save($studentTotal) ) {
                $this->out('saved the total of student_id '.$student->id);
            }
            $this->out('The sum of the total is '.$sum);
        }
        return true;
    }

    public function calculateTermlyPosition($class_id,$term_id,$session_id)
    {
        // Initializes the All required tables
        $termlyPositionTable = TableRegistry::get('StudentTermlyPositions');

        $students = $termlyPositionTable->find('all')->where(['class_id'=>$class_id,
                                                              'term_id' => $term_id,
                                                              'session_id' => $session_id
        ])->order(['total'=>'DESC'])->toArray();

        $position = 1;
        foreach ($students as $student ) {
            $student['position'] = $position ;
            $termlyPositionTable->save($student);

            // Increment the position variable .
            $position++;
        }
        return true;
    }

    public function calculateStudentTermlySubjectPosition($class_id,$term_id,$session_id)
    {
        //Initialize all required Tables
        $classTable = TableRegistry::get('App.Classes');
        $subjectTable = TableRegistry::get('App.Subjects');
        $termlyResultTable = TableRegistry::get('StudentTermlyResults');
        $termlySubjectPositionTable = TableRegistry::get('StudentTermlySubjectPositions');

        // find the block the class_id is under. Either junior or senior
        $classDetail = $classTable->find('all')->where(['id'=>$class_id])->first();
        $block_id = $classDetail['block_id'];

        $subjects = $subjectTable->find('all')->where(['block_id'=>$block_id])->toArray();

        // loops through each particular subject
        // and find the students under that course for each particular class,
        // term and session .

        foreach ( $subjects as $subject ) {
            $studentsStudyingTheSubject = $termlyResultTable->find('all')->where(['subject_id' => $subject['id'],
                                                                                  'class_id' => $class_id,
                                                                                  'term_id' => $term_id,
                                                                                  'session_id' => $session_id
            ])->order(['total'=>'DESC'])->toArray();

            $position = 1;
            foreach ( $studentsStudyingTheSubject as $studentStudyingTheSubject ) {

                $studentSubjectPosition = $termlySubjectPositionTable->find('all')->where(['student_id' => $studentStudyingTheSubject['student_id'],
                                                                                           'subject_id' => $studentStudyingTheSubject['subject_id'],
                                                                                            'class_id'   => $class_id,
                                                                                            'term_id'    => $term_id,
                                                                                            'session_id' => $session_id
                ])->first();

                if ( $studentSubjectPosition == null ) {

                    $studentSubjectPosition = $termlySubjectPositionTable->newEntity(['student_id' => $studentStudyingTheSubject['student_id'],
                                                                                        'subject_id' => $studentStudyingTheSubject['subject_id'],
                                                                                        'total'      => $studentStudyingTheSubject['total'],
                                                                                        'position'   => $position,
                                                                                        'class_id'   => $class_id,
                                                                                        'term_id'    => $term_id,
                                                                                        'session_id' => $session_id
                    ]);

                } else {

                    $newData = (['student_id' => $studentStudyingTheSubject['student_id'],
                        'subject_id' => $studentStudyingTheSubject['subject_id'],
                        'total'      => $studentStudyingTheSubject['total'],
                        'position'   => $position,
                        'class_id'   => $class_id,
                        'term_id'    => $term_id,
                        'session_id' => $session_id
                    ]);

                    $studentSubjectPosition = $termlySubjectPositionTable->patchEntity($studentSubjectPosition,$newData);
                }

                if ($termlySubjectPositionTable->save($studentSubjectPosition)) {
                    $this->out('Saved the subject position');
                }
                // increment the position variable
                $position++;
            }
        }
        return true;

    }

    public function calculateTermlyPositionBasedOnClassDemacation($class_id,$term_id,$session_id)
    {
        // Initializes the required tables
        $studentTable = TableRegistry::get('App.Students');
        $classDemacationTable = TableRegistry::get('App.ClassDemacations');
        $termlyPositionTable = TableRegistry::get('StudentTermlyPositions');
        $termlyPositionOnClassDemacationTable = TableRegistry::get('StudentTermlyPositionOnClassDemacations');

        $classDemacations = $classDemacationTable->find('all')->where(['class_id' => $class_id])->toArray();

        // loops through each class demarcations
        // and inputs the total of each students under a particular class demarcation
        // using the class_id passed value .
        foreach ( $classDemacations as $classDemacation ) {

            $studentsInEachClassDemacation = $studentTable->find('all')->where(['class_demacation_id' => $classDemacation['id'],
                                                                                'session_id'          => $session_id
            ])->toArray();

            // This foreach expression is used to input the total from the termlyPositionTable in the termlyPositionBasedOnClassDemacation

            foreach ( $studentsInEachClassDemacation as $studentInClassDemacation ) {
                $studentDetailsInTermlyPositionTable = $termlyPositionTable->find('all')->where(['student_id' => $studentInClassDemacation['id'],
                                                                                                 'class_id'   => $class_id,
                                                                                                 'term_id'    => $term_id,
                                                                                                 'session_id' => $session_id

                ])->first();
                $this->out($studentDetailsInTermlyPositionTable);

                // Input the collected details in the termly position on class demacation table

                $studentDetailsInTermlyPositionOnClassDemacationTable = $termlyPositionOnClassDemacationTable->find('all')->where(['student_id' => $studentDetailsInTermlyPositionTable['student_id'],
                                                                                                                                    'class_id'  => $class_id,
                                                                                                                                    'term_id'   => $term_id,
                                                                                                                                    'class_demacation_id' => $classDemacation['id'],
                                                                                                                                    'session_id' => $session_id
                ])->first();

                if ( $studentDetailsInTermlyPositionOnClassDemacationTable == null ) {

                    $studentDetailsInTermlyPositionOnClassDemacationTable = $termlyPositionOnClassDemacationTable->newEntity(['student_id' => $studentDetailsInTermlyPositionTable['student_id'],
                                                                                                                              'total'      => $studentDetailsInTermlyPositionTable['total'],
                                                                                                                               'average'   => $studentDetailsInTermlyPositionTable['average'],
                                                                                                                                'class_id' => $class_id,
                                                                                                                                 'class_demacation_id' => $classDemacation['id'],
                                                                                                                                 'term_id' => $term_id,
                                                                                                                                  'session_id' => $session_id
                    ]);
                } else {
                    $newData = ['student_id' => $studentDetailsInTermlyPositionTable['student_id'],
                                'total'      => $studentDetailsInTermlyPositionTable['total'],
                                'average'   => $studentDetailsInTermlyPositionTable['average'],
                                'class_id' => $class_id,
                                'class_demacation_id' => $classDemacation['id'],
                                'term_id' => $term_id,
                                'session_id' => $session_id
                    ];

                    $studentDetailsInTermlyPositionOnClassDemacationTable = $termlyPositionOnClassDemacationTable->patchEntity($studentDetailsInTermlyPositionOnClassDemacationTable,$newData);
                }
                if ( $termlyPositionOnClassDemacationTable->save($studentDetailsInTermlyPositionOnClassDemacationTable )) {
                    $this->out($studentDetailsInTermlyPositionOnClassDemacationTable);
                }
            }

        }

        // calculates the positions of each students in each class demacations based on the total

        foreach ( $classDemacations as $classDemacation ) {

            $studentsInEachClassDemacation = $termlyPositionOnClassDemacationTable->find('all')->where(['class_id' => $class_id,
                                                                                                        'class_demacation_id' => $classDemacation['id'],
                                                                                                        'term_id'            => $term_id,
                                                                                                        'session_id'         => $session_id
            ])->orderDesc('total')->toArray();

            $position = 1;
            foreach ( $studentsInEachClassDemacation as $studentInClassDemacation ) {
                $studentInClassDemacation['position'] = $position ;

                $termlyPositionOnClassDemacationTable->save($studentInClassDemacation);

                $position++;
            }
        }

        return true;
    }

    public function calculateTermlySubjectPostionOnClassDemacation( $class_id,$term_id,$session_id )
    {
        //Initialize all required Tables
        $classTable = TableRegistry::get('App.Classes');
        $subjectTable = TableRegistry::get('App.Subjects');
        $studentTable = TableRegistry::get('App.Students');
        $classDemacationTable = TableRegistry::get('App.ClassDemacations');
        $termlySubjectPositionTable = TableRegistry::get('StudentTermlySubjectPositions');
        $termlySubjectPositionOnClassDemarcationTable = TableRegistry::get('StudentTermlySubjectPositionOnClassDemacations');

        // find the block the class_id is under. Either junior or senior
        $classDetail = $classTable->find('all')->where(['id'=>$class_id])->first();
        $block_id = $classDetail['block_id'];

        // find all the subjects studied by that class using the block id.
        $subjects = $subjectTable->find('all')->where(['block_id'=>$block_id])->toArray();

        $classDemacations = $classDemacationTable->find('all')->where(['class_id' => $class_id])->toArray();

        // calculates the students in each class demacation and categories with the different subjects.
        foreach ( $classDemacations as $classDemacation ) {

            $studentsInEachClassDemacation = $studentTable->find('all')->where(['class_demacation_id' => $classDemacation['id'],
                'session_id'          => $session_id
            ])->toArray();

            // This foreach expression is used to input the total from the termlyPositionTable in the termlyPositionBasedOnClassDemacation

            foreach ( $studentsInEachClassDemacation as $studentInClassDemacation ) {

                foreach($subjects as $subject ) {
                    $studentSubjectDetailInTermlySubjectPositionTable = $termlySubjectPositionTable->find('all')->where(['student_id' => $studentInClassDemacation['id'],
                                                                                                        'subject_id' => $subject['id'],
                                                                                                        'class_id'   => $class_id,
                                                                                                        'term_id'    => $term_id,
                                                                                                        'session_id' => $session_id
                    ])->toArray();

                    //$this->out($studentSubjectDetailInTermlySubjectPositionTable);

                    // Building the data to Enter into the termlySubjectPositionOnClassDemacartionTable

                    // first is to check if the data exists in the table using the
                    // $student_id , $subject_id , $class_id , $term_id, $session_id

                    $studentSubjectDetailInTermlySubjectPositionOnClassDemacationTable = $termlySubjectPositionOnClassDemarcationTable->find('all')
                        ->where(['student_id' => $studentInClassDemacation['id'],
                                 'subject_id' => $subject['id'],
                                 'class_id'   => $class_id,
                                 'class_demacation_id' => $classDemacation['id'],
                                 'term_id'    => $term_id,
                                 'session_id' => $session_id
                        ])->first();

                    if ( $studentSubjectDetailInTermlySubjectPositionOnClassDemacationTable == null ) {

                        $studentSubjectDetailInTermlySubjectPositionOnClassDemacationTable = $termlySubjectPositionOnClassDemarcationTable->newEntity(['student_id' => $studentInClassDemacation['id'],
                                                                                                                                                        'subject_id' => $subject['id'],
                                                                                                                                                        'total'      => $studentSubjectDetailInTermlySubjectPositionTable[0]['total'],
                                                                                                                                                        'class_id'   => $class_id,
                                                                                                                                                        'class_demacation_id' => $classDemacation['id'],
                                                                                                                                                        'term_id'    => $term_id,
                                                                                                                                                        'session_id' => $session_id
                        ]);

                    } else {
                        $newData = ['student_id' => $studentInClassDemacation['id'],
                                    'subject_id' => $subject['id'],
                                    'total'      => $studentSubjectDetailInTermlySubjectPositionTable[0]['total'],
                                    'class_id'   => $class_id,
                                    'class_demacation_id' => $classDemacation['id'],
                                    'term_id'    => $term_id,
                                    'session_id' => $session_id
                        ];
                        $studentSubjectDetailInTermlySubjectPositionOnClassDemacationTable = $termlySubjectPositionOnClassDemarcationTable->patchEntity($studentSubjectDetailInTermlySubjectPositionOnClassDemacationTable,$newData);

                    }

                    if ($termlySubjectPositionOnClassDemarcationTable->save($studentSubjectDetailInTermlySubjectPositionOnClassDemacationTable) ) {

                    }


                }
            }

        }

        // Calculate the students in a particular subject under a class demarcation .
        
        foreach ($subjects as $subject ) {
            // get the students in a subject under a particular class demarcation
            $this->hr();
            foreach ( $classDemacations as $classDemacation ) {

                $studentsUnderTheSubjectInClassDemarcation = $termlySubjectPositionOnClassDemarcationTable->find('all')
                    ->where(['subject_id' => $subject['id'],
                        'class_demacation_id' => $classDemacation['id'],
                        'class_id'            => $class_id,
                        'term_id'             => $term_id,
                        'session_id'         => $session_id
                    ])->orderDesc('total')->toArray();

                $position = 1;
                foreach ( $studentsUnderTheSubjectInClassDemarcation as $studentUnderTheSubjectInClassDemarcation ) {
                    $studentUnderTheSubjectInClassDemarcation['position'] = $position ;

                    $this->out($studentUnderTheSubjectInClassDemarcation);

                    $termlySubjectPositionOnClassDemarcationTable->save($studentUnderTheSubjectInClassDemarcation);
                    $position++;
                }
                $this->out($studentsUnderTheSubjectInClassDemarcation);
            }

        }
        return true;

    }

    /**
     * This section is used to calculate the annual result of the students
     *
     */

    // Todo : Algorithm under process
    public function calculateAnnualTotals($class_id,$session_id)
    {
        // Initialize the required tables
        $studentTable = TableRegistry::get('App.Students');
        $classTable   = TableRegistry::get('App.Classes');
        $subjectTable = TableRegistry::get('App.Subjects');
        $annualResultTable = TableRegistry::get('StudentAnnualResults');

        $classDetail = $classTable->find('all')->where(['id' => $class_id])->first();

        $subjects = $subjectTable->find('all')->where(['block_id' => $classDetail['block_id']])->toArray();

        $studentsInAClass = $studentTable->find('all')
            ->where(['class_id' => $class_id,
                     'session_id' => $session_id
            ])->toArray();

        foreach ( $studentsInAClass as $studentInAClass ) {

            $this->out('For '.$studentInAClass['last_name']);
            foreach ( $subjects as $subject ) {

                $this->out('For subject '.$subject['name']);

                $studentTermlyTotalForSubjectInAllTerm = $annualResultTable->find('all')
                    ->where(['student_id' => $studentInAClass['id'],
                        'subject_id' => $subject['id'],
                        'class_id'   => $class_id,
                        'session_id' => $session_id
                    ])->toArray();

                //$this->out($studentTermlyTotalForSubjectInAllTerm);

                foreach ($studentTermlyTotalForSubjectInAllTerm as $studentAnnualTotalForASubject ) {

                    // set the total index in the array
                    // the total is first term + second term + third term
                    $studentAnnualTotalForASubject['total'] = $studentAnnualTotalForASubject['first_term'] +
                        $studentAnnualTotalForASubject['second_term'] + $studentAnnualTotalForASubject['third_term'];

                    $studentAnnualTotalForASubject['average'] = $this->_determineNumberPrecision( $studentAnnualTotalForASubject['total'] / 3) ;
                   $this->out($studentAnnualTotalForASubject);

                    if ($annualResultTable->save($studentAnnualTotalForASubject)) {
                        $this->out($studentAnnualTotalForASubject);
                    }

                }

            }
        }

    }

    public function inputTotalInAnnualPositionTable($class_id,$session_id)
    {
        // Initialize the required tables
        $studentTable = TableRegistry::get('App.Students');
        $classTable   = TableRegistry::get('App.Classes');
        $subjectTable = TableRegistry::get('App.Subjects');
        $annualResultTable = TableRegistry::get('StudentAnnualResults');
        $annualPositionTable = TableRegistry::get('StudentAnnualPositions');

        $classDetail = $classTable->find('all')->where(['id' => $class_id])->first();

        $subjects = $subjectTable->find('all')->where(['block_id' => $classDetail['block_id']])->toArray();

        $studentsInAClass = $studentTable->find('all')
            ->where(['class_id' => $class_id,
                'session_id' => $session_id
            ])->toArray();

        foreach ( $studentsInAClass as $studentInAClass ) {

            $this->out('For '.$studentInAClass['last_name']);

            $studentTermlyTotalForSubjectInAllTerm = $annualResultTable->find('all')
                ->where(['student_id' => $studentInAClass['id'],
                    'class_id'   => $class_id,
                    'session_id' => $session_id
                ])->toArray();

            //$this->out($studentTermlyTotalForSubjectInAllTerm);

            // This value contains the sum of the subject totals
            $sumOfSubjectTotal = 0;

            foreach ($studentTermlyTotalForSubjectInAllTerm as $studentAnnualTotalInASubject) {

                $sumOfSubjectTotal += $studentAnnualTotalInASubject['total'];
            }
            $subjectAverage = $sumOfSubjectTotal / count($studentTermlyTotalForSubjectInAllTerm);

            $studentDetailsInAnnualPositionTable = $annualPositionTable->find('all')
                ->where(['student_id' => $studentInAClass['id'],
                        'class_id'    => $class_id,
                        'session_id' => $session_id
                ])->first();

            if ($studentDetailsInAnnualPositionTable == null ) {
                $studentDetailsInAnnualPositionTable = $annualPositionTable->newEntity(['student_id' => $studentInAClass['id'],
                                                                                        'total'      => $sumOfSubjectTotal,
                                                                                        'average'    => $subjectAverage,
                                                                                        'class_id'  => $class_id,
                                                                                        'session_id' => $session_id
                ]);
            } else {
                $newData = ['student_id' => $studentInAClass['id'],
                    'total'      => $sumOfSubjectTotal,
                    'average'    => $subjectAverage,
                    'class_id'  => $class_id,
                    'session_id' => $session_id
                ];
                $studentDetailsInAnnualPositionTable = $annualPositionTable->patchEntity($studentDetailsInAnnualPositionTable,$newData);
            }
            if ($annualPositionTable->save($studentDetailsInAnnualPositionTable) ) {
                $this->out($studentDetailsInAnnualPositionTable);
            }
        }

        // This function is used to calculate the student positions
        $this->calculateAnnualPosition($class_id,$session_id);

    }

    public function calculateAnnualPosition($class_id,$session_id)
    {
        // Initializes the All required tables
        $annualPositionTable = TableRegistry::get('StudentAnnualPositions');

        $students = $annualPositionTable->find('all')->where(['class_id'=>$class_id,
            'session_id' => $session_id
        ])->order(['total'=>'DESC'])->toArray();

        $position = 1;
        foreach ($students as $student ) {
            $student['position'] = $position ;
            $annualPositionTable->save($student);

            // Increment the position variable .
            $position++;
        }
        return true;
    }

    public function calculateStudentAnnualSubjectPosition($class_id,$session_id)
    {
        //Initialize all required Tables
        $classTable = TableRegistry::get('App.Classes');
        $subjectTable = TableRegistry::get('App.Subjects');
        $annualResultTable = TableRegistry::get('StudentAnnualResults');
        $annualSubjectPositionTable = TableRegistry::get('StudentAnnualSubjectPositions');

        // find the block the class_id is under. Either junior or senior
        $classDetail = $classTable->find('all')->where(['id'=>$class_id])->first();

        // The block id is used to get all subjects belonging to a particular block
        $block_id = $classDetail['block_id'];

        $subjects = $subjectTable->find('all')->where(['block_id'=>$block_id])->toArray();

        // loops through each particular subject
        // and find the students under that course for each particular class,
        // term and session .

        foreach ( $subjects as $subject ) {
            $studentsStudyingTheSubject = $annualResultTable->find('all')->where(['subject_id' => $subject['id'],
                'class_id' => $class_id,
                'session_id' => $session_id
            ])->order(['total'=>'DESC'])->toArray();

            $this->out($subject['name']);
            $position = 1;
            foreach ( $studentsStudyingTheSubject as $studentStudyingTheSubject ) {

                $studentSubjectPosition = $annualSubjectPositionTable->find('all')->where(['student_id' => $studentStudyingTheSubject['student_id'],
                    'subject_id' => $studentStudyingTheSubject['subject_id'],
                    'class_id'   => $class_id,
                    'session_id' => $session_id
                ])->first();

                if ( $studentSubjectPosition == null ) {

                    $studentSubjectPosition = $annualSubjectPositionTable->newEntity(['student_id' => $studentStudyingTheSubject['student_id'],
                        'subject_id' => $studentStudyingTheSubject['subject_id'],
                        'total'      => $studentStudyingTheSubject['total'],
                        'position'   => $position,
                        'class_id'   => $class_id,
                        'session_id' => $session_id
                    ]);

                } else {

                    $newData = (['student_id' => $studentStudyingTheSubject['student_id'],
                        'subject_id' => $studentStudyingTheSubject['subject_id'],
                        'total'      => $studentStudyingTheSubject['total'],
                        'position'   => $position,
                        'class_id'   => $class_id,
                        'session_id' => $session_id
                    ]);

                    $studentSubjectPosition = $annualSubjectPositionTable->patchEntity($studentSubjectPosition,$newData);
                }

                if ($annualSubjectPositionTable->save($studentSubjectPosition)) {
                    $this->out($studentSubjectPosition);
                }

                // increment the position variable
                $position++;
            }
        }
        return true;
    }


    public function calculateAnnualPositionBasedOnClassDemacation($class_id,$session_id)
    {
        // Initializes the required tables
        $studentTable = TableRegistry::get('App.Students');
        $classDemacationTable = TableRegistry::get('App.ClassDemacations');
        $annualPositionTable = TableRegistry::get('StudentAnnualPositions');
        $annualPositionOnClassDemacationTable = TableRegistry::get('StudentAnnualPositionOnClassDemacations');

        $classDemacations = $classDemacationTable->find('all')->where(['class_id' => $class_id])->toArray();

        // loops through each class demarcations
        // and inputs the total of each students under a particular class demarcation
        // using the class_id passed value .
        foreach ( $classDemacations as $classDemacation ) {

            $studentsInEachClassDemacation = $studentTable->find('all')->where(['class_demacation_id' => $classDemacation['id'],
                'session_id'          => $session_id
            ])->toArray();

            // This foreach expression is used to input the total from the termlyPositionTable in the termlyPositionBasedOnClassDemacation

            foreach ( $studentsInEachClassDemacation as $studentInClassDemacation ) {
                $studentDetailsInAnnualPositionTable = $annualPositionTable->find('all')->where(['student_id' => $studentInClassDemacation['id'],
                    'class_id'   => $class_id,
                    'session_id' => $session_id

                ])->first();
                $this->out($studentDetailsInAnnualPositionTable);

                // Input the collected details in the termly position on class demacation table

                $studentDetailsInAnnualPositionOnClassDemacationTable = $annualPositionOnClassDemacationTable->find('all')->where(['student_id' => $studentDetailsInAnnualPositionTable['student_id'],
                    'class_id'  => $class_id,
                    'class_demacation_id' => $classDemacation['id'],
                    'session_id' => $session_id
                ])->first();

                if ( $studentDetailsInAnnualPositionOnClassDemacationTable == null ) {

                    $studentDetailsInAnnualPositionOnClassDemacationTable = $annualPositionOnClassDemacationTable->newEntity(['student_id' => $studentDetailsInAnnualPositionTable['student_id'],
                        'total'      => $studentDetailsInAnnualPositionTable['total'],
                        'average'   => $studentDetailsInAnnualPositionTable['average'],
                        'class_id' => $class_id,
                        'class_demacation_id' => $classDemacation['id'],
                        'session_id' => $session_id
                    ]);
                } else {
                    $newData = ['student_id' => $studentDetailsInAnnualPositionTable['student_id'],
                        'total'      => $studentDetailsInAnnualPositionTable['total'],
                        'average'   => $studentDetailsInAnnualPositionTable['average'],
                        'class_id' => $class_id,
                        'class_demacation_id' => $classDemacation['id'],
                        'session_id' => $session_id
                    ];

                    $studentDetailsInAnnualPositionOnClassDemacationTable = $annualPositionOnClassDemacationTable->patchEntity($studentDetailsInAnnualPositionOnClassDemacationTable,$newData);
                }
                if ( $annualPositionOnClassDemacationTable->save($studentDetailsInAnnualPositionOnClassDemacationTable )) {
                    $this->out($studentDetailsInAnnualPositionOnClassDemacationTable);
                }
            }

        }

        // calculates the positions of each students in each class demacations based on the total

        foreach ( $classDemacations as $classDemacation ) {

            $studentsInEachClassDemacation = $annualPositionOnClassDemacationTable->find('all')->where(['class_id' => $class_id,
                'class_demacation_id' => $classDemacation['id'],
                'session_id'         => $session_id
            ])->orderDesc('total')->toArray();

            $position = 1;
            foreach ( $studentsInEachClassDemacation as $studentInClassDemacation ) {
                $studentInClassDemacation['position'] = $position ;

                $annualPositionOnClassDemacationTable->save($studentInClassDemacation);

                $position++;
            }
        }
        return true;
    }


    public function calculateAnnualSubjectPostionOnClassDemacation( $class_id,$session_id )
    {
        //Initialize all required Tables
        $classTable = TableRegistry::get('App.Classes');
        $subjectTable = TableRegistry::get('App.Subjects');
        $studentTable = TableRegistry::get('App.Students');
        $classDemacationTable = TableRegistry::get('App.ClassDemacations');
        $annualSubjectPositionTable = TableRegistry::get('StudentAnnualSubjectPositions');
        $annualSubjectPositionOnClassDemarcationTable = TableRegistry::get('StudentAnnualSubjectPositionOnClassDemacations');

        // find the block the class_id is under. Either junior or senior
        $classDetail = $classTable->find('all')->where(['id'=>$class_id])->first();
        $block_id = $classDetail['block_id'];

        // find all the subjects studied by that class using the block id.
        $subjects = $subjectTable->find('all')->where(['block_id'=>$block_id])->toArray();

        $classDemacations = $classDemacationTable->find('all')->where(['class_id' => $class_id])->toArray();

        // calculates the students in each class demacation and categories with the different subjects.
        foreach ( $classDemacations as $classDemacation ) {

            $studentsInEachClassDemacation = $studentTable->find('all')->where(['class_demacation_id' => $classDemacation['id'],
                'session_id'          => $session_id
            ])->toArray();

            // This foreach expression is used to input the total from the annualPositionTable into the annualPositionBasedOnClassDemarcation

            foreach ( $studentsInEachClassDemacation as $studentInClassDemacation ) {

                foreach($subjects as $subject ) {
                    $studentSubjectDetailInAnnualSubjectPositionTable = $annualSubjectPositionTable->find('all')->where(['student_id' => $studentInClassDemacation['id'],
                        'subject_id' => $subject['id'],
                        'class_id'   => $class_id,
                        'session_id' => $session_id
                    ])->toArray();

                    //$this->out($studentSubjectDetailInTermlySubjectPositionTable);

                    // Building the data to Enter into the termlySubjectPositionOnClassDemacartionTable

                    // first is to check if the data exists in the table using the
                    // $student_id , $subject_id , $class_id , $term_id, $session_id

                    $studentSubjectDetailInAnnualSubjectPositionOnClassDemacationTable = $annualSubjectPositionOnClassDemarcationTable->find('all')
                        ->where(['student_id' => $studentInClassDemacation['id'],
                            'subject_id' => $subject['id'],
                            'class_id'   => $class_id,
                            'class_demacation_id' => $classDemacation['id'],
                            'session_id' => $session_id
                        ])->first();

                    if ( $studentSubjectDetailInAnnualSubjectPositionOnClassDemacationTable == null ) {

                        $studentSubjectDetailInAnnualSubjectPositionOnClassDemacationTable = $annualSubjectPositionOnClassDemarcationTable->newEntity(['student_id' => $studentInClassDemacation['id'],
                            'subject_id' => $subject['id'],
                            'total'      => $studentSubjectDetailInAnnualSubjectPositionTable[0]['total'],
                            'class_id'   => $class_id,
                            'class_demacation_id' => $classDemacation['id'],
                            'session_id' => $session_id
                        ]);

                    } else {
                        $newData = ['student_id' => $studentInClassDemacation['id'],
                            'subject_id' => $subject['id'],
                            'total'      => $studentSubjectDetailInAnnualSubjectPositionTable[0]['total'],
                            'class_id'   => $class_id,
                            'class_demacation_id' => $classDemacation['id'],
                            'session_id' => $session_id
                        ];
                        $studentSubjectDetailInAnnualSubjectPositionOnClassDemacationTable = $annualSubjectPositionOnClassDemarcationTable->patchEntity($studentSubjectDetailInAnnualSubjectPositionOnClassDemacationTable,$newData);

                    }

                    if ($annualSubjectPositionOnClassDemarcationTable->save($studentSubjectDetailInAnnualSubjectPositionOnClassDemacationTable) ) {

                    }


                }
            }

        }


        // Calculate the students positions in a particular subject under a particular class demarcation .

        foreach ($subjects as $subject ) {
            // get the students in a subject under a particular class demarcation
            $this->hr();
            foreach ( $classDemacations as $classDemacation ) {

                $studentsUnderTheSubjectInClassDemarcation = $annualSubjectPositionOnClassDemarcationTable->find('all')
                    ->where(['subject_id' => $subject['id'],
                        'class_demacation_id' => $classDemacation['id'],
                        'class_id'            => $class_id,
                        'session_id'         => $session_id
                    ])->orderDesc('total')->toArray();

                $position = 1;
                foreach ( $studentsUnderTheSubjectInClassDemarcation as $studentUnderTheSubjectInClassDemarcation ) {
                    $studentUnderTheSubjectInClassDemarcation['position'] = $position ;

                    $this->out($studentUnderTheSubjectInClassDemarcation);

                    $annualSubjectPositionOnClassDemarcationTable->save($studentUnderTheSubjectInClassDemarcation);
                    $position++;
                }
                $this->out($studentsUnderTheSubjectInClassDemarcation);
            }

        }
        return true;

    }
}