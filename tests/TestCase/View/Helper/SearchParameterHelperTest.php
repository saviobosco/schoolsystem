<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/17/16
 * Time: 5:28 PM
 */

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\SearchParameterHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

class SearchParameterHelperTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        $View = new View();
        $this->SearchParameter = new SearchParameterHelper($View);
    }

    public function testGetDefaultValue()
    {
        $result = $this->SearchParameter->getdefaultValue('1');
        $this->assertEquals('1',$result);
        $result = $this->SearchParameter->getdefaultValue();
        $this->assertEquals('',$result);

    }

    public function testGetDefaultYear()
    {
        $result = $this->SearchParameter->getdefaultYear(2016);
        $this->assertEquals(2016,$result);
        $result = $this->SearchParameter->getdefaultYear();
        $this->assertEquals(date('Y'),$result);


    }
}