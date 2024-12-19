<?php

use App\AdvancedMath;
use PHPUnit\Framework\TestCase;

class IsPrimeTest extends TestCase
{
    protected $advancedMath;

    protected function setUp(): void
    {
        $this->advancedMath = new AdvancedMath();
    }

    // 1. Test case for a positive prime number
    public function testIsPrimePositivePrime()
    {
        $result = $this->advancedMath->isPrime(7); // 7 is a prime number
        $this->assertTrue($result);
    }

    // 2. Test case for a positive non-prime number
    public function testIsPrimePositiveNonPrime()
    {
        $result = $this->advancedMath->isPrime(4); // 4 is not a prime number
        $this->assertFalse($result);
    }

    // 3. Test case for zero
    public function testIsPrimeZero()
    {
        $result = $this->advancedMath->isPrime(0); // 0 is not a prime number
        $this->assertFalse($result);
    }

    // 4. Test case for a negative number
    public function testIsPrimeNegative()
    {
        $result = $this->advancedMath->isPrime(-7); // Negative numbers are not prime
        $this->assertFalse($result);
    }

    // 5. Test case for a large prime number
    public function testIsPrimeLargePrime()
    {
        $result = $this->advancedMath->isPrime(7919); // 7919 is a prime number
        $this->assertTrue($result);
    }

    // 6. Test case for string input
    public function testIsPrimeString()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Input must be an integer");
        $this->advancedMath->isPrime("hello");
    }

    // 7. Test case for null input
    public function testIsPrimeNull()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Input must be an integer");
        $this->advancedMath->isPrime(null);
    }

    // 8. Test case for infinite input
    public function testIsPrimeInfinite()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Infinite values are not allowed");
        $this->advancedMath->isPrime(INF);
    }

    // 9. Test case for array input
    public function testIsPrimeArray()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Input must be an integer");
        $this->advancedMath->isPrime([7]);
    }
}
