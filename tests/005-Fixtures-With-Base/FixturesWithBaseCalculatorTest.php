<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FixturesWithBaseCalculatorTest extends CalculatorTestCase
{
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
