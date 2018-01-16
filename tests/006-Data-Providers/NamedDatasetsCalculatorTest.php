<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class NamedDatasetsCalculatorTest extends CalculatorTestCase
{
  public function additionProvider()
  {
    return [
      'positive integers 0' => [1, 1, 2],
      'positive integers 1' => [1, 2, 3],
      'positive integers 2' => [2, 1, 3],
      'positive integers 3' => [2, 2, 4],
      'negative integers 4' => [-1, -1, -2],
      'negative integers 5' => [-1, -2, -3],
      'negative integers 6' => [-2, -1, -3],
      'negative integers 7' => [-2, -2, -4],
      'mixed integers 0'    => [-2, 1, -1],
      'mixed integers 1'    => [-2, 2, 0],
      'mixed integers 2'    => [-1, 1, 0],
      'mixed integers 3'    => [1, -1, 0],
      'mixed integers 4'    => [-1, 2, 1],
      'mixed integers 5'    => [1, -2, -1],
      'mixed integers 6'    => [2, -1, 1],
      'mixed integers 7'    => [2, -2, 0],
      'some zeros 0'        => [0, -2, -2],
      'some zeros 1'        => [0, -1, -1],
      'some zeros 2'        => [0, 0, 0],
      'some zeros 3'        => [0, 1, 1],
      'some zeros 4'        => [0, 2, 2],
      'some zeros 5'        => [-2, 0, -2],
      'some zeros 6'        => [-1, 0, -1],
      'some zeros 7'        => [0, 0, 0],
      'some zeros 8'        => [1, 0, 1],
      'some zeros 9'        => [2, 0, 2]
    ];
  }

  /**
  * @dataProvider additionProvider
  */
  public function testAdd($a, $b, $expected)
  {
    $this->assertEquals($expected, $this->calculator->add($a, $b));
  }

}
