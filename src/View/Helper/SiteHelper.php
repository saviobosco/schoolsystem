<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/21/16
 * Time: 10:50 PM
 */

namespace App\View\Helper;


use Cake\View\Helper;

class SiteHelper extends Helper
{
    public $helpers = ['Html'];
    public function css($link)
    {
        return '<link href="/assets/plugins/'.$link.'" rel="stylesheet" >';
    }

    public function script($link)
    {
        return '<script src="/assets/plugins/'.$link.'" > </script>';
    }

    public function loadScripts()
    {
        $scripts = [];
    }

}