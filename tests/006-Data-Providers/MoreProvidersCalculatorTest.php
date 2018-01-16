<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MoreProvidersCalculatorTest extends CalculatorTestCase
{
  public function zeroProvider()
  {
    return [
      [0, -2, -2], [0, -1, -1], [0, 0, 0], [0, 1, 1], [0, 2, 2],
      [-2, 0, -2], [-1, 0, -1], [0, 0, 0], [1, 0, 1], [2, 0, 2]
    ];
  }

  public function positiveIntegerProvider()
  {
    return [ [1, 1, 2], [1, 2, 3], [2, 1, 3], [2, 2, 4] ];
  }

  public function negativeIntegerProvider()
  {
    return [ [-1, -1, -2], [-1, -2, -3], [-2, -1, -3], [-2, -2, -4] ];
  }

  public function integerProvider()
  {
      return   [
        [-2, 1, -1], [-2, 2, 0], [-1, 1, 0], [1, -1, 0],
        [-1, 2, 1], [1, -2, -1], [2, -1, 1], [2, -2, 0]
      ];
  }

  /**
  * @dataProvider zeroProvider
  */
  public function testAddZeros($a, $b, $expected)
  {
    $this->assertEquals($expected, $this->calculator->add($a, $b));
  }

  /**
  * @dataProvider positiveIntegerProvider
  */
  public function testAddwithPositiveIntegers($a, $b, $expected)
  {
    $this->assertEquals($expected, $this->calculator->add($a, $b));
  }

  /**
  * @dataProvider negativeIntegerProvider
  */
  public function testAddwithNegativeIntegers($a, $b, $expected)
  {
    $this->assertEquals($expected, $this->calculator->add($a, $b));
  }

  /**
  * @dataProvider integerProvider
  */
  public function testAddIntegers($a, $b, $expected)
  {
    $this->assertEquals($expected, $this->calculator->add($a, $b));
  }

}
