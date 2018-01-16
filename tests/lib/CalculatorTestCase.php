<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

abstract class CalculatorTestCase extends TestCase
{
  protected $calculator;

  public static function setUpBeforeClass()
  {
    //fwrite(STDOUT, __METHOD__ . "\n");
  }

  public static function tearDownAfterClass()
  {
    //fwrite(STDOUT, "\n" . __METHOD__ . "\n");
  }

  protected function assertPreConditions()
  {
    //fwrite(STDOUT, __METHOD__ . "\n");
  }

  protected function assertPostConditions()
  {
      //fwrite(STDOUT, __METHOD__ . "\n");
  }

  protected function onSuccessfulTest()
  {
      //fwrite(STDOUT, __METHOD__ . "\n");
  }

  protected function onNotSuccessfulTest(Throwable $e)
  {
      //fwrite(STDOUT, __METHOD__ . "\n");
      throw $e;
  }

  protected function setUp()
  {
    //fwrite(STDOUT, __METHOD__ . "\n");
    $this->calculator = new Calculator();
  }

  protected function tearDown()
  {
    //fwrite(STDOUT, __METHOD__ . "\n");
    unset($this->calculator);
  }

}
