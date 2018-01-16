<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class IteratorDatasetCalculatorTest extends CalculatorTestCase
{
  public function additionProvider()
  {
    return new CSVFileIterator(dirname(__FILE__) . DIRECTORY_SEPARATOR  . 'addition.csv');
  }

  /**
  * @dataProvider additionProvider
  */
  public function testAdd($a, $b, $expected)
  {
    $this->assertEquals($expected, $this->calculator->add($a, $b));
  }

}
