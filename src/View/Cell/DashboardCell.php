<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/16/16
 * Time: 3:39 PM
 */

namespace App\View\Cell;


use Cake\View\Cell;

class DashboardCell extends Cell
{
    public function display()
    {

    }

    public function getNumberOfNursingStudents()
    {
        $this->loadModel('Students');
        $schools = $this->Students->find()->where(['school_id'=>1]);
        $this->set('schools', $schools->count());
    }

    public function getNumberOfMidwiferyStudents()
    {
        $this->loadModel('Students');
        $students = $this->Students->find()->where(['school_id'=>2]);
        $this->set('students', $students->count());
    }

    public function getNumberOfCourses()
    {
        $this->loadModel('Courses');
        $courses = $this->Courses->find();
        $this->set('courses', $courses->count());
    }

    public function getNumberOfSessions()
    {
        $this->loadModel('Sessions');
        $sessions = $this->Sessions->find();
        $this->set('sessions', $sessions->count());
    }
}