<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FailingCalculatorTest extends TestCase
{
    public function testAdd()
    {
        $this->markTestIncomplete('This tests has not been implemented yet.');

        $this->assertNotNull(null);
        $this->assertEquals('BAD EXPECTATIONS', 'Actual Result', "We expect this to fail");

    }

}
