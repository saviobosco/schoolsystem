<?php
namespace ResultSystem\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use ResultSystem\Model\Table\ResultBannerImagesTable;

/**
 * ResultSystem\Model\Table\ResultBannerImagesTable Test Case
 */
class ResultBannerImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \ResultSystem\Model\Table\ResultBannerImagesTable
     */
    public $ResultBannerImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.result_system.result_banner_images'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ResultBannerImages') ? [] : ['className' => 'ResultSystem\Model\Table\ResultBannerImagesTable'];
        $this->ResultBannerImages = TableRegistry::get('ResultBannerImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResultBannerImages);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
