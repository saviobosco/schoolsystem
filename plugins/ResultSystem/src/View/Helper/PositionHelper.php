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
        // implementing in the case of 11,12,13
        if ( $position > 10 ) {
            $lastTwoPositionDigit = substr((int)$position, -1);

            if ( $lastTwoPositionDigit === 11 || $lastTwoPositionDigit === 12 || $lastTwoPositionDigit === 13) {
                return $position.'th';
            }
        }

        $lastPositionDigit = substr((int)$position, -1);

        if ( $lastPositionDigit === 1) {
            return $position .'st';
        } elseif ( $lastPositionDigit === 2 ) {
            return $position.'nd';
        } elseif ( $lastPositionDigit === 3 ) {
            return $position.'rd';
        } else {
            return $position.'th';
        }
    }

}