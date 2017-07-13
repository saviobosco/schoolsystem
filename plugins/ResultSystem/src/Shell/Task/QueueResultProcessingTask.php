<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/3/16
 * Time: 10:06 PM
 */

namespace ResultSystem\Shell\Task;


use ResultSystem\ResultProcessing\AnnualResultProcessing;
use ResultSystem\ResultProcessing\TermlyResultProcessing;
use Cake\Collection\Collection;
use Cake\I18n\Number;
use Cake\ORM\TableRegistry;
use Queue\Shell\Task\QueueTask;
use ResultSystem\Model\Entity\GradeableTrait;


class QueueResultProcessingTask extends QueueTask
{
    use GradeableTrait;
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
        if ($this->QueuedTasks->createJob('ResultProcessing',['class_id'=>1,'session_id' =>1,'term_id' =>1] )) {
            $this->out('OK, job created, now run the worker');
        } else {
            $this->err('Could not create Job');
        }
    }

    public function run($data , $id = null)
    {
        /**
         *  This checks if the submitted parameters contains the class_id
         *  if the class_id is missing then it indicates the calculation of all classes
         *  results in that term and session
         */
        if ( empty($data['class_id']) ) {
            $classes = $this->getAllClasses();

            foreach ( $classes as $class ) {
                $termlyResultProcessing  = new TermlyResultProcessing($class->id,$data['term_id'],$data['session_id']);

                if ($termlyResultProcessing->getStatus()) {
                    $this->out('Successfully Calculated the students termly results ');
                }
                if ( isset($data['term_id'] ) && $data['term_id'] == 3  ) {

                    $annualResultProcessing = new AnnualResultProcessing($class->id,$data['session_id']);
                    if ($annualResultProcessing->getStatus()) {
                        $this->out('Successfully Calculated the students annual results');
                    }
                }
            }
        } else {

            /**
             *  If the class_id exists then that class result is calculated accordingly .
             */

            // process the result with the supplied parameters
            $termlyResultProcessing  = new TermlyResultProcessing($data['class_id'],$data['term_id'],$data['session_id']);

            if ($termlyResultProcessing->getStatus()) {
                $this->out('Successfully Calculated the students termly results ');
            }
            if ( isset($data['term_id'] ) && $data['term_id'] == 3  ) {

                $annualResultProcessing = new AnnualResultProcessing($data['class_id'],$data['session_id']);
                if ($annualResultProcessing->getStatus()) {
                    $this->out('Successfully Calculated the students annual results');
                }
            }
        }


        return true;
    }


    public function getAllClasses()
    {
        $classTable = TableRegistry::get('App.Classes');
        return $classTable->find('all')->toArray();
    }

}