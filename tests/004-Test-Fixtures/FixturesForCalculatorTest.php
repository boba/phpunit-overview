<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FixturesForCalculatorTest extends TestCase
{
  private $calculator;

  public static function setUpBeforeClass()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
  }

  public static function tearDownAfterClass()
  {
    fwrite(STDOUT, "\n" . __METHOD__ . "\n");
  }

  protected function assertPreConditions()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
  }

  protected function assertPostConditions()
  {
      fwrite(STDOUT, __METHOD__ . "\n");
  }

  protected function onSuccessfulTest()
  {
      fwrite(STDOUT, __METHOD__ . "\n");
  }

  protected function onNotSuccessfulTest(Throwable $e)
  {
      fwrite(STDOUT, __METHOD__ . "\n");
      throw $e;
  }

  protected function setUp()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
    $this->calculator = new Calculator();
  }

  protected function tearDown()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
    unset($this->calculator);
  }

  public function testAdd()
  {
    $result = $this->calculator->add(0, 0);

    $this->assertNotNull($result);
    $this->assertEquals(0, $result);
  }

  public function testAddwithZeroAsTheFirstAddend()
  {
    $this->assertEquals(-2, $this->calculator->add(0, -2));
    $this->assertEquals(-1, $this->calculator->add(0, -1));
    $this->assertEquals(0, $this->calculator->add(0, 0));
    $this->assertEquals(1, $this->calculator->add(0, 1));
    $this->assertEquals(2, $this->calculator->add(0, 2));
  }

  public function testAddwithZeroAsTheSecondAddend()
  {
    $this->assertEquals(-2, $this->calculator->add(-2, 0));
    $this->assertEquals(-1, $this->calculator->add(-1, 0));
    $this->assertEquals(0, $this->calculator->add(0, 0));
    $this->assertEquals(1, $this->calculator->add(1, 0));
    $this->assertEquals(2, $this->calculator->add(2, 0));
  }

  public function testAddwithPositiveIntegers()
  {
    $this->assertEquals(2, $this->calculator->add(1, 1));
    $this->assertEquals(3, $this->calculator->add(1, 2));
    $this->assertEquals(3, $this->calculator->add(2, 1));
    $this->assertEquals(4, $this->calculator->add(2, 2));
  }

  public function testAddwithNegativeIntegers()
  {
    $this->assertEquals(-2, $this->calculator->add(-1, -1));
    $this->assertEquals(-3, $this->calculator->add(-1, -2));
    $this->assertEquals(-3, $this->calculator->add(-2, -1));
    $this->assertEquals(-4, $this->calculator->add(-2, -2));
  }

  public function testAddwithPositiveAndNegativeIntegers()
  {
    $this->assertEquals(-1, $this->calculator->add(-2, 1));
    $this->assertEquals(0, $this->calculator->add(-2, 2));
    $this->assertEquals(0, $this->calculator->add(-1, 1));
    $this->assertEquals(1, $this->calculator->add(-1, 2));
    $this->assertEquals(0, $this->calculator->add(1, -1));
    $this->assertEquals(-1, $this->calculator->add(1, -2));
    $this->assertEquals(1, $this->calculator->add(2, -1));
    $this->assertEquals(0, $this->calculator->add(2, -2));
  }

}
