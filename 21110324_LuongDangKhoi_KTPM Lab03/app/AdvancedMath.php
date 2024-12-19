<?php

namespace App;


class AdvancedMath
{
    // Tính giai thừa của một số
    public function factorial($number)
    {
        if (!is_int($number)) {
            throw new \InvalidArgumentException("Invalid input type");
        }

        if ($number < 0) {
            throw new \InvalidArgumentException("Factorial is not defined for negative numbers");
        }

        if ($number === INF) {
            throw new \InvalidArgumentException("Invalid input type");
        }

        if ($number > 170) { // Beyond this, PHP's `gmp_fact()` can't handle the result
            throw new \OverflowException("Factorial result too large");
        }

        $result = 1;
        for ($i = 1; $i <= $number; $i++) {
            $result *= $i;
        }

        return $result;
    }


    // Tính lũy thừa
    public function power($base, $exponent)
    {
        if (!is_numeric($base) || !is_numeric($exponent)) {
            throw new \InvalidArgumentException("Invalid input type");
        }

        if (is_infinite($base) || is_infinite($exponent)) {
            throw new \InvalidArgumentException("Invalid input type");
        }

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
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException("Invalid input type");
        }

        if ($number < 0) {
            return null;
        }

        if (is_infinite($number)) {
            throw new \InvalidArgumentException("Infinite is invalid");
        }

        return sqrt($number);
    }


    // Tính tổng của các số chẵn trong một mảng
    public function sumOfEvens($numbers)
    {
        if (!is_array($numbers)) {
            throw new \InvalidArgumentException("Input must be an array");
        }

        foreach ($numbers as $item) {
            if (!is_numeric($item)) {
                throw new \InvalidArgumentException("All elements must be numbers");
            }

            if (is_infinite($item)) {
                throw new \InvalidArgumentException("Infinite values are not allowed");
            }
        }

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
        if ($number === INF || $number === -INF) {
            throw new \InvalidArgumentException("Infinite values are not allowed");
        }

        if (!is_int($number)) {
            throw new \InvalidArgumentException("Input must be an integer");
        }

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

        foreach ($numbers as $num) {
            if (!is_numeric($num)) {
                throw new \InvalidArgumentException("All elements must be numeric");
            }
        }

        return max($numbers);
    }
}
