<?php

use App\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorSelectedTests extends TestCase
{
    protected $calculator;

    public function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    // 1. Test Mean with Empty Array
    public function testMeanWithEmptyArray()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Array cannot be empty");
        $this->calculator->mean([]); // Expecting exception for empty array
    }

    // 2. Test Median with Empty Array
    public function testMedianWithEmptyArray()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Array cannot be empty");
        $this->calculator->median([]); // Expecting exception for empty array
    }

    // 3. Test Mean with Non-Numeric Values
    public function testMeanWithNonNumericValues()
    {
        $numbers = [5, "abc", 10];
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Array elements must be numeric values");
        $this->calculator->mean($numbers); // Expecting exception for non-numeric values
    }

    // 4. Test Median with Non-Numeric Values
    public function testMedianWithNonNumericValues()
    {
        $numbers = [10, "xyz", 5];
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Array elements must be numeric values");
        $this->calculator->median($numbers); // Expecting exception for non-numeric values
    }

    // 5. Test Mean with Floating Point Numbers
    public function testMeanWithFloatingPointNumbers()
    {
        $numbers = [0.1, 0.2, 0.3];
        $result = $this->calculator->mean($numbers);

        // Use a tolerance of 0.0001 to handle floating-point precision issues
        $this->assertEquals(0.2, $result, '', 0.0001); // 0.0001 tolerance
    }

    // 6. Test Median with Floating Point Numbers
    public function testMedianWithFloatingPointNumbers()
    {
        $numbers = [0.1, 0.2, 0.3];
        $result = $this->calculator->median($numbers);
        $this->assertEquals(0.2, $result); // Median should be the middle value
    }

    // 7. Test Mean with Null Values
    public function testMeanWithNullValues()
    {
        $numbers = [10, null, 20];
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Array elements must be numeric values");
        $this->calculator->mean($numbers); // Expecting exception for null value in array
    }

    // 8. Test Median with Null Values
    public function testMedianWithNullValues()
    {
        $numbers = [10, null, 20];
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Array elements must be numeric values");
        $this->calculator->median($numbers); // Expecting exception for null value in array
    }

    // 9. Test Mean with Infinite Values
    public function testMeanWithInfiniteValues()
    {
        $numbers = [1, INF, 2];
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Array cannot contain INF");

        $this->calculator->mean($numbers);
    }

    // 10. Test Median with Infinite Values
    public function testMedianWithInfiniteValues()
    {
        $numbers = [1, INF, 2];
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Array cannot contain INF");

        $this->calculator->median($numbers);
    }
}
