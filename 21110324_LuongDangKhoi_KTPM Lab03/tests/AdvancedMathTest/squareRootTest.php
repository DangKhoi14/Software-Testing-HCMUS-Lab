<?php

use App\AdvancedMath;
use PHPUnit\Framework\TestCase;

class SquareRootTest extends TestCase
{
    protected $advancedMath;

    protected function setUp(): void
    {
        $this->advancedMath = new AdvancedMath();
    }

    // 1. Test case for a positive number
    public function testSquareRootPositive()
    {
        $result = $this->advancedMath->squareRoot(16);
        $this->assertEquals(4, $result); // √16 = 4
    }

    // 2. Test case for zero
    public function testSquareRootZero()
    {
        $result = $this->advancedMath->squareRoot(0);
        $this->assertEquals(0, $result); // √0 = 0
    }

    // 3. Test case for a negative number
    public function testSquareRootNegative()
    {
        $result = $this->advancedMath->squareRoot(-9);
        $this->assertNull($result); // √(-9) is not defined, so return null
    }

    // 4. Test case for a large number
    public function testSquareRootLarge()
    {
        $result = $this->advancedMath->squareRoot(1e10);
        $this->assertEquals(100000, $result); // √1e10 = 100000
    }

    // 5. Test case for string input
    public function testSquareRootString()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->squareRoot("string");
    }

    // 6. Test case for null input
    public function testSquareRootNull()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->squareRoot(null);
    }

    // 7. Test case for infinite input
    public function testSquareRootInfinite()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Infinite is invalid");
        $this->advancedMath->squareRoot(INF);
    }

    // 8. Test case for array input
    public function testSquareRootArray()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->squareRoot([1, 2, 3]);
    }
}
