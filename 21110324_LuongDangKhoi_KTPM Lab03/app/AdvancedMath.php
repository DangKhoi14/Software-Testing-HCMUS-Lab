<?php

namespace App;


class AdvancedMath
{
    // Tính giai thừa của một số
    public function factorial($n)
    {
        if ($n < 0) {
            throw new \InvalidArgumentException("Negative numbers not allowed");
        }
        $result = 1;
        for ($i = 1; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }


    // Tính lũy thừa
    public function power($base, $exponent)
    {
        return $base ** $exponent;
    }


    // Tính căn bậc hai
    public function squareRoot($number)
    {
        if ($number < 0) {
            return null;
        }
        return sqrt($number);
    }


    // Tính tổng của các số chẵn trong một mảng
    public function sumOfEvens(array $numbers)
    {
        return array_reduce($numbers, function ($carry, $item) {
            if ($item % 2 == 0) {
                $carry += $item;
            }
            return $carry;
        });
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
