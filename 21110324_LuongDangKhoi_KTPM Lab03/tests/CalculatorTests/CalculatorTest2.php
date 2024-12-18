<?php

use App\Calculator;
use PHPUnit\Framework\TestCase;


class CalculatorTest2 extends TestCase
{
    protected $calculator;


    public function setUp(): void
    {
        $this->calculator = new Calculator();
    }


    public function testMul()
    {
        $result      = $this->calculator->multiply(10, 12);
        $this->assertEquals(120, $result);
    }


    public function testDiv()
    {
        $result      = $this->calculator->divide(160, 140);
        $this->assertGreaterThan(1, $result);
    }

    public function testDivByZero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $result = $this->calculator->divide(10, 0);
    }
}
