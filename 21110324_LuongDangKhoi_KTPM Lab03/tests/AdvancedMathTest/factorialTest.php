<?php

use App\AdvancedMath;
use PHPUnit\Framework\TestCase;

class FactorialTest extends TestCase
{
    protected $advancedMath;

    // Set up AdvancedMath instance for all tests
    protected function setUp(): void
    {
        $this->advancedMath = new AdvancedMath();
    }

    // 1. Test factorial for a positive number
    public function testFactorialPositive()
    {
        $result = $this->advancedMath->factorial(5);
        $this->assertEquals(120, $result);
    }

    // 2. Test factorial for zero
    public function testFactorialZero()
    {
        $result = $this->advancedMath->factorial(0);
        $this->assertEquals(1, $result);
    }

    // 3. Test factorial for a negative number
    public function testFactorialNegative()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Factorial is not defined for negative numbers");
        $this->advancedMath->factorial(-5);
    }

    // 4. Test factorial for a large number
    public function testFactorialLarge()
    {
        $this->expectException(\OverflowException::class);
        $this->expectExceptionMessage("Factorial result too large");
        $this->advancedMath->factorial(171);
    }

    // 5. Test factorial for a string input
    public function testFactorialString()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->factorial("hello");
    }

    // 6. Test factorial for a null input
    public function testFactorialNull()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->factorial(null);
    }

    // 7. Test factorial for an infinite input
    public function testFactorialInfinite()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Factorial result too large");
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->factorial(INF);
    }

    // 8. Test factorial for an array input
    public function testFactorialArray()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->factorial([1, 2, 3]);
    }
}
