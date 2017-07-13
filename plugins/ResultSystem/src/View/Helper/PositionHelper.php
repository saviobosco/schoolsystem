<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/12/16
 * Time: 11:12 AM
 */

namespace ResultSystem\View\Helper;


use Cake\View\Helper;

class PositionHelper extends Helper
{
    public function formatPositionOutput($position)
    {
        if (empty($position)) {
            return '';
        }
        switch ($position) {
            case 1 :
                return $position .'st';
                break;
            case 2 :
                return $position.'nd';
                break;
            case 3 :
                return $position.'rd';
                break;
            default :
                return $position.'th';
        }

    }

}