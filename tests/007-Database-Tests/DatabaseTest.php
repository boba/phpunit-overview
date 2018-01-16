<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class DatabaseTest extends TestCase
{
  use TestCaseTrait;

  protected $pdo;

  public function getConnection()
  {
    if (null === $this->pdo)
    {
      $this->pdo = new PDO('sqlite::memory:');
      $this->pdo->exec('create table numbers (id INTEGER PRIMARY KEY, vala INTEGER, valb INTEGER, valc INTEGER)');
    }
    return $this->createDefaultDBConnection($this->pdo, ':memory:');
  }

  public function getDataSet()
  {
    return $this->createFlatXMLDataSet(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'numbers-seed.xml');
  }

  public function testRowCount()
  {
    $this->assertEquals(2, $this->getConnection()->getRowCount('numbers'));
  }

  public function testCountQuery()
  {
    $count = $this->pdo->query("SELECT count(1) FROM numbers")->fetchColumn();
    $this->assertEquals(2, $count);
  }

  public function testQuery()
  {
    $sql = 'SELECT id, vala, valb, valc FROM numbers';

    $statement = $this->pdo->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll();

    $this->assertNotNull($data);
    $this->assertEquals(2, count($data));
  }
}
