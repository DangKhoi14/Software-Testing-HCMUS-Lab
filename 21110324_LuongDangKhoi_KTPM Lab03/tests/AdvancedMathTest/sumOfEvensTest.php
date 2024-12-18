<?php

use App\AdvancedMath;
use PHPUnit\Framework\TestCase;

class SumOfEvensTest extends TestCase
{
    protected $advancedMath;

    protected function setUp(): void
    {
        $this->advancedMath = new AdvancedMath();
    }

    // 1. Test case for all positive even numbers
    public function testSumOfEvensPositiveEvenNumbers()
    {
        $result = $this->advancedMath->sumOfEvens([2, 4, 6, 8]);
        $this->assertEquals(20, $result); // 2 + 4 + 6 + 8 = 20
    }

    // 2. Test case for mixed even and odd numbers
    public function testSumOfEvensMixedNumbers()
    {
        $result = $this->advancedMath->sumOfEvens([1, 2, 3, 4, 5, 6]);
        $this->assertEquals(12, $result); // 2 + 4 + 6 = 12
    }

    // 3. Test case for all odd numbers
    public function testSumOfEvensAllOddNumbers()
    {
        $result = $this->advancedMath->sumOfEvens([1, 3, 5, 7]);
        $this->assertEquals(0, $result); // No even numbers, sum is 0
    }

    // 4. Test case for an empty array
    public function testSumOfEvensEmptyArray()
    {
        $result = $this->advancedMath->sumOfEvens([]);
        $this->assertEquals(0, $result); // Empty array, sum is 0
    }

    // 5. Test case for an array with negative numbers
    public function testSumOfEvensNegativeNumbers()
    {
        $result = $this->advancedMath->sumOfEvens([-2, -3, -4, -5]);
        $this->assertEquals(-6, $result); // -2 + -4 = -6
    }

    // 6. Test case for non-numeric values
    public function testSumOfEvensNonNumericValues()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("All elements must be numbers");
        $this->advancedMath->sumOfEvens([2, "hello", 4]);
    }

    // 7. Test case for an array with zero
    public function testSumOfEvensWithZero()
    {
        $result = $this->advancedMath->sumOfEvens([0, 2, 4]);
        $this->assertEquals(6, $result); // 0 + 2 + 4 = 6
    }

    // 8. Test case for infinite values
    public function testSumOfEvensInfinite()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Infinite values are not allowed");
        $this->advancedMath->sumOfEvens([1, 2, INF]);
    }

    // 9. Test case for non-array input
    public function testSumOfEvensWithNonArrayInput()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Input must be an array");

        $this->advancedMath->sumOfEvens(42); // Non-array input
    }
}
