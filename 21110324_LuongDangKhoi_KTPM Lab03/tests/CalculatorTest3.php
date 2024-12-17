<?php

use App\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest3 extends TestCase
{
    protected $calculator;

    public function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    // 3. Test Mean with an Empty Array
    public function testMeanWithEmptyArray()
    {
        $this->expectWarning();
        $this->calculator->mean([]);
    }

    // 4. Test Median with Even Number of Elements
    public function testMedianEvenNumbers()
    {
        $numbers = [10, 5, 8, 2];
        $result = $this->calculator->median($numbers);
        $this->assertEquals(6.5, $result); // Correct mean of middle numbers: 5 and 8
    }

    // 5. Test Median with Unsorted Array
    public function testMedianUnsortedArray()
    {
        $numbers = [5, 10, 1, 3];
        $result = $this->calculator->median($numbers);
        $this->assertEquals(4, $result); // Median: sorted [1, 3, 5, 10] => 4
    }

    // 6. Test Mean with Non-Numeric Values
    public function testMeanWithNonNumericValues()
    {
        $numbers = [10, "abc", 5];
        $this->expectWarning(); // Expecting PHP warning for array_sum with invalid input
        $this->calculator->mean($numbers);
    }
}
