<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class BetterCalculatorTest extends TestCase
{
  public function testAdd()
  {
    $calculator = new Calculator();
    $result = $calculator->add(0, 0);

    $this->assertNotNull($result);
    $this->assertEquals(0, $result);
  }

  public function testAddwithZeroAsTheFirstAddend()
  {
    $calculator = new Calculator();
    $this->assertEquals(-2, $calculator->add(0, -2));
    $this->assertEquals(-1, $calculator->add(0, -1));
    $this->assertEquals(0, $calculator->add(0, 0));
    $this->assertEquals(1, $calculator->add(0, 1));
    $this->assertEquals(2, $calculator->add(0, 2));
  }

  public function testAddwithZeroAsTheSecondAddend()
  {
    $calculator = new Calculator();
    $this->assertEquals(-2, $calculator->add(-2, 0));
    $this->assertEquals(-1, $calculator->add(-1, 0));
    $this->assertEquals(0, $calculator->add(0, 0));
    $this->assertEquals(1, $calculator->add(1, 0));
    $this->assertEquals(2, $calculator->add(2, 0));
  }

}
