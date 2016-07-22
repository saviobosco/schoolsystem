<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/1/16
 * Time: 5:23 PM
 */

namespace App\Controller\Traits;


trait SearchParameterTrait
{

    protected function _getSchool($school_id)
    {
        if (empty($school_id)) {
            return '1';
        }
        return $school_id;
    }


    protected function _getYear($year)
    {
        if (empty($year)) {
            return date('Y');
        }
        return $year;
    }

    protected function _getSession($session)
    {
        if (empty($session)) {
            return '';
        }
        return $session;
    }

    protected function _getSemester($semester)
    {
        if (empty($semester)) {
            return '1';
        }
        return $semester;
    }
}