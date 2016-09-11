<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClienteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClienteTable Test Case
 */
class ClienteTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClienteTable
     */
    public $Cliente;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cliente',
        'app.chamados'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cliente') ? [] : ['className' => 'App\Model\Table\ClienteTable'];
        $this->Cliente = TableRegistry::get('Cliente', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cliente);

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
