<?php

use App\AdvancedMath;
use PHPUnit\Framework\TestCase;

class FindMaxTest extends TestCase
{
    protected $advancedMath;

    protected function setUp(): void
    {
        $this->advancedMath = new AdvancedMath();
    }

    // 1. Test case for an array of positive numbers
    public function testFindMaxPositiveNumbers()
    {
        $result = $this->advancedMath->findMax([1, 2, 3, 4, 5]);
        $this->assertEquals(5, $result);
    }

    // 2. Test case for an array of negative numbers
    public function testFindMaxNegativeNumbers()
    {
        $result = $this->advancedMath->findMax([-1, -2, -3, -4, -5]);
        $this->assertEquals(-1, $result);
    }

    // 3. Test case for a mixed array of positive and negative numbers
    public function testFindMaxMixedNumbers()
    {
        $result = $this->advancedMath->findMax([-10, 0, 5, -2, 3]);
        $this->assertEquals(5, $result);
    }

    // 4. Test case for a single-element array
    public function testFindMaxSingleElement()
    {
        $result = $this->advancedMath->findMax([42]);
        $this->assertEquals(42, $result);
    }

    // 5. Test case for an empty array
    public function testFindMaxEmptyArray()
    {
        $result = $this->advancedMath->findMax([]);
        $this->assertNull($result);
    }

    // 6. Test case for an array with duplicate max values
    public function testFindMaxDuplicateMaxValues()
    {
        $result = $this->advancedMath->findMax([5, 1, 5, 3, 2]);
        $this->assertEquals(5, $result);
    }

    // 7. Test case for non-array input
    public function testFindMaxNonArrayInput()
    {
        $this->expectException(\TypeError::class); // PHP will throw a TypeError for non-array input
        $this->advancedMath->findMax(42);
    }

    // 8. Test case for non-numeric values in the array
    public function testFindMaxNonNumericValues()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("All elements must be numeric");
        $this->advancedMath->findMax([1, "hello", 3]);
    }

    // 9. Test case for an array with infinite values
    public function testFindMaxInfiniteValues()
    {
        $result = $this->advancedMath->findMax([1, INF, 3]);
        $this->assertEquals(INF, $result);
    }

    // 10. Test case for an array with zero
    public function testFindMaxWithZero()
    {
        $result = $this->advancedMath->findMax([0, -1, -2, 3]);
        $this->assertEquals(3, $result);
    }
}
