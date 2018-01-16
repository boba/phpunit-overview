<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class BasicCalculatorTest extends TestCase
{
  public function testAdd()
  {
    $calculator = new Calculator();

    $result = $calculator->add(0, 0);

    $this->assertNotNull($result);
    $this->assertEquals(0, $result);
  }

}
