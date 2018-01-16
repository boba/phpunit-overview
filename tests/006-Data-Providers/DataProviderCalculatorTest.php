<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class DataProviderCalculatorTest extends CalculatorTestCase
{
  public function zeroProvider()
  {
    return [
      [0, -2, -2], [0, -1, -1], [0, 0, 0], [0, 1, 1], [0, 2, 2],
      [-2, 0, -2], [-1, 0, -1], [0, 0, 0], [1, 0, 1], [2, 0, 2]
    ];
  }

  /**
  * @dataProvider zeroProvider
  */
  public function testAddZeros($a, $b, $expected)
  {
    $this->assertEquals($expected, $this->calculator->add($a, $b));
  }

}
