<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContinentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContinentsTable Test Case
 */
class ContinentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContinentsTable
     */
    protected $Continents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Continents',
        'app.Authors',
        'app.Nationalities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Continents') ? [] : ['className' => ContinentsTable::class];
        $this->Continents = $this->getTableLocator()->get('Continents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Continents);

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
}
