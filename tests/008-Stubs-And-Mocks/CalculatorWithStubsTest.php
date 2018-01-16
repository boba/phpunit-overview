<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CalculatorWithStubsTest extends TestCase
{
    private $calculator;

    protected function setUp()
    {
        $this->calculator = $this->createMock(Calculator::class);
    }

    protected function tearDown()
    {
        unset($this->calculator);
    }

    public function testCalculatorAdd()
    {
        $calculatorStub = $this->createMock(Calculator::class);
        $calculatorStub->method('add')->willReturn('0');

        $this->assertEquals(0, $calculatorStub->add(0, 0));
    }

    public function testCurtaBotAddWithRealCalculator()
    {
        $pdoStub = $this->createMock(PDO::class);
        $calculatorStub = new Calculator();

        $bot = new CurtaBot($pdoStub, $calculatorStub);

        $this->assertEquals(0, $bot->addination(0, 0));
        $this->assertEquals(1, $bot->addination(0, 1));
        $this->assertEquals(1, $bot->addination(1, 0));
        $this->assertEquals(2, $bot->addination(1, 1));
    }

    public function testCurtaBotAddWithCalculatorStub()
    {
        $pdoStub = $this->createMock(PDO::class);
        $calculatorStub = $this->createMock(Calculator::class);

        $bot = new CurtaBot($pdoStub, $calculatorStub);

        $calculatorStub->method('add')->willReturn(999);

        $this->assertEquals(999, $bot->addination(0, 0));
        $this->assertEquals(999, $bot->addination(0, 1));
        $this->assertEquals(999, $bot->addination(1, 0));
        $this->assertEquals(999, $bot->addination(1, 1));
    }

    public function testCurtaBotAddWithCalculatorWithABetterStub()
    {
        $pdoStub = $this->createMock(PDO::class);
        $calculatorStub = $this->createMock(Calculator::class);

        $bot = new CurtaBot($pdoStub, $calculatorStub);

        $calculatorStub->method('add')->will($this->onConsecutiveCalls(0, 1, 1, 2));

        $this->assertEquals(0, $bot->addination(0, 0));
        $this->assertEquals(1, $bot->addination(0, 1));
        $this->assertEquals(1, $bot->addination(1, 0));
        $this->assertEquals(2, $bot->addination(1, 1));
    }

    public function testCurtaBotAddWithCalculatorMock()
    {
        $pdoStub = $this->createMock(PDO::class);
        $calculatorMock = $this->getMockBuilder(Calculator::class)
            ->setMethods(['add'])
            ->getMock();

        $calculatorMock->expects($this->once())
            ->method('add')
            ->with($this->equalTo(0), $this->equalTo(0))
            ->willReturn(0);

        $bot = new CurtaBot($pdoStub, $calculatorMock);

        $this->assertEquals(0, $bot->addination(0, 0));
    }

    public function testCurtaBotAddWithCalculatorMoreMock()
    {
        $pdoStub = $this->createMock(PDO::class);
        $calculatorMock = $this->getMockBuilder(Calculator::class)
            ->setMethods(['add'])
            ->getMock();

        $calculatorMock->expects($this->exactly(2))
            ->method('add')
            ->withConsecutive([$this->equalTo(0), $this->equalTo(0)], [$this->equalTo(0), $this->equalTo(1)])
            ->will($this->onConsecutiveCalls(0, 1));

        $bot = new CurtaBot($pdoStub, $calculatorMock);

        $this->assertEquals(0, $bot->addination(0, 0));
        $this->assertEquals(1, $bot->addination(0, 1));
    }

}
