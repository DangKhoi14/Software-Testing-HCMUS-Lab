<?php

namespace App;


class AdvancedMath
{
    // Tính giai thừa của một số
    public function factorial($number)
    {
        // Validate input type
        if (!is_int($number)) {
            throw new \InvalidArgumentException("Invalid input type");
        }

        // Check for negative numbers
        if ($number < 0) {
            throw new \InvalidArgumentException("Factorial is not defined for negative numbers");
        }

        // Check for infinite input
        if ($number === INF) {
            throw new \InvalidArgumentException("Invalid input type");
        }

        // Check for large numbers
        if ($number > 170) { // Beyond this, PHP's `gmp_fact()` can't handle the result
            throw new \OverflowException("Factorial result too large");
        }

        // Calculate factorial
        $result = 1;
        for ($i = 1; $i <= $number; $i++) {
            $result *= $i;
        }

        return $result;
    }


    // Tính lũy thừa
    public function power($base, $exponent)
    {
        // Validate input types
        if (!is_numeric($base) || !is_numeric($exponent)) {
            throw new \InvalidArgumentException("Invalid input type");
        }

        // Check for infinite values
        if (is_infinite($base) || is_infinite($exponent)) {
            throw new \InvalidArgumentException("Invalid input type");
        }

        // Handle overflow cases
        try {
            $result = $base ** $exponent;
        } catch (\ArithmeticError $e) {
            throw new \OverflowException("Result too large");
        }

        if (is_infinite($result)) {
            throw new \OverflowException("Result too large");
        }

        return $result;
    }



    // Tính căn bậc hai
    public function squareRoot($number)
    {
        // Check for invalid input types
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException("Invalid input type");
        }

        // Check for negative numbers
        if ($number < 0) {
            return null;
        }

        // Handle infinite numbers
        if (is_infinite($number)) {
            throw new \InvalidArgumentException("Infinite is invalid");
        }

        // Return the square root
        return sqrt($number);
    }


    // Tính tổng của các số chẵn trong một mảng
    public function sumOfEvens($numbers)
    {
        // Ensure the input is an array
        if (!is_array($numbers)) {
            throw new \InvalidArgumentException("Input must be an array");
        }

        // Validate that all elements in the array are numeric
        foreach ($numbers as $item) {
            if (!is_numeric($item)) {
                throw new \InvalidArgumentException("All elements must be numbers");
            }

            // Check if the value is infinite
            if (is_infinite($item)) {
                throw new \InvalidArgumentException("Infinite values are not allowed");
            }
        }

        // Calculate the sum of even numbers
        return array_reduce($numbers, function ($carry, $item) {
            if ($item % 2 == 0) {
                $carry += $item;
            }
            return $carry;
        }, 0);
    }



    // Kiểm tra số nguyên tố
    public function isPrime($number)
    {
        if ($number < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }


    // Tìm số lớn nhất trong một mảng
    public function findMax(array $numbers)
    {
        if (empty($numbers)) {
            return null;
        }
        return max($numbers);
    }
}
