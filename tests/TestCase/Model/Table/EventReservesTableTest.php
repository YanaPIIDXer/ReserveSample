<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventReservesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventReservesTable Test Case
 */
class EventReservesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EventReservesTable
     */
    public $EventReserves;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EventReserves',
        'app.Events',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EventReserves') ? [] : ['className' => EventReservesTable::class];
        $this->EventReserves = TableRegistry::getTableLocator()->get('EventReserves', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EventReserves);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
