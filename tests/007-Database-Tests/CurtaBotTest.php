<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class CurtaBotTest extends TestCase
{
    use TestCaseTrait {
        setUp as protected traitSetUp;
    }

    protected $pdo;
    protected $bot;
    protected $calculator;

    public function getConnection()
    {
        if (null === $this->pdo) {
            $this->pdo = new PDO('sqlite::memory:');
            $this->pdo->exec('create table numbers (id INTEGER PRIMARY KEY, vala INTEGER, valb INTEGER, valc INTEGER)');
        }

        return $this->createDefaultDBConnection($this->pdo, ':memory:');
    }

    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'numbers-seed.xml');
    }

    protected function setUp()
    {
        $this->traitSetUp();
        $this->calculator = new Calculator();
        $this->bot = new CurtaBot($this->pdo, $this->calculator);
    }

    protected function tearDown()
    {
        unset($this->bot);
        unset($this->calculator);
    }

    public function testRowCount()
    {
        $this->assertEquals(2, $this->getConnection()->getRowCount('numbers'));
    }

    public function testGetSumInvalidID()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->bot->getSumById(-1);

    }

    public function testGetSum()
    {
        $this->assertEquals(1, $this->bot->getSumById(1));
        $this->assertEquals(2, $this->bot->getSumById(2));
    }

}
