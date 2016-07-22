<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/6/16
 * Time: 11:55 AM
 */

namespace App\View\Helper;


use Cake\View\Helper;

class AdmissionHelper extends Helper
{
    public function admissionStatus($status)
    {
        if ($status) {
            return '<span class="text-success"> Admitted </span>';
        } else {
            return '<span class="text-danger">Not Admitted </span>';
        }
    }
}