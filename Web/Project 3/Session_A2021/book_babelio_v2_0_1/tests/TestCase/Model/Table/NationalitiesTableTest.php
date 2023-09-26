<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NationalitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NationalitiesTable Test Case
 */
class NationalitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NationalitiesTable
     */
    protected $Nationalities;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Nationalities',
        'app.Continents',
        'app.Authors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Nationalities') ? [] : ['className' => NationalitiesTable::class];
        $this->Nationalities = $this->getTableLocator()->get('Nationalities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Nationalities);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
