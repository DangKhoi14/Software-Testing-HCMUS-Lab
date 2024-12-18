<?php

use App\AdvancedMath;
use PHPUnit\Framework\TestCase;

class PowerTest extends TestCase
{
    protected $advancedMath;

    protected function setUp(): void
    {
        $this->advancedMath = new AdvancedMath();
    }

    // 1. Test case for positive base and exponent
    public function testPowerPositive()
    {
        $result = $this->advancedMath->power(2, 3);
        $this->assertEquals(8, $result); // 2^3 = 8
    }

    // 2. Test case for base zero and positive exponent
    public function testPowerZeroBasePositiveExponent()
    {
        $result = $this->advancedMath->power(0, 5);
        $this->assertEquals(0, $result); // 0^5 = 0
    }

    // 3. Test case for positive base and zero exponent
    public function testPowerPositiveBaseZeroExponent()
    {
        $result = $this->advancedMath->power(5, 0);
        $this->assertEquals(1, $result); // 5^0 = 1
    }

    // 4. Test case for base zero and exponent zero
    public function testPowerZeroBaseZeroExponent()
    {
        $result = $this->advancedMath->power(0, 0);
        $this->assertEquals(1, $result); // 0^0 = 1 (by convention)
    }

    // 5. Test case for negative base and positive exponent
    public function testPowerNegativeBasePositiveExponent()
    {
        $result = $this->advancedMath->power(-2, 3);
        $this->assertEquals(-8, $result); // (-2)^3 = -8
    }

    // 6. Test case for positive base and negative exponent
    public function testPowerPositiveBaseNegativeExponent()
    {
        $result = $this->advancedMath->power(2, -3);
        $this->assertEquals(0.125, $result, '', 0.0001); // 2^-3 = 1 / (2^3) = 0.125
    }

    // 7. Test case for large base and exponent
    public function testPowerLarge()
    {
        $this->expectException(\OverflowException::class);
        $this->expectExceptionMessage("Result too large");
        $this->advancedMath->power(10, 10000);
    }

    // 8. Test case for string input
    public function testPowerString()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->power("base", 2);
    }

    // 9. Test case for null input
    public function testPowerNull()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->power(null, 3);
    }

    // 10. Test case for infinite base
    public function testPowerInfiniteBase()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->power(INF, 2);
    }

    // 11. Test case for infinite exponent
    public function testPowerInfiniteExponent()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->power(2, INF);
    }

    // 12. Test case for array input
    public function testPowerArray()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid input type");
        $this->advancedMath->power([2, 3], 2);
    }
}
