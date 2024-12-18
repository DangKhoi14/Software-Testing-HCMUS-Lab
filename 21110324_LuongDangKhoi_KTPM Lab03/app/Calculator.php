<?php

namespace App;

class Calculator
{
    // Constants for rounding precision
    const ROUND_PRECISION = 2;

    /**
     * Calculate the summary
     * @param $num1, num2 numbers
     * @return float summary result
     */
    public function add($num1, $num2)
    {
        // Check for INF
        if (is_infinite($num1) || is_infinite($num2)) {
            throw new \InvalidArgumentException("One or both values are infinite");
        }

        // Check for invalid input type (array instead of number)
        if (is_array($num1) || is_array($num2) || !is_numeric($num1) || !is_numeric($num2)) {
            throw new \InvalidArgumentException("Both inputs must be numbers, not arrays or non-numeric values");
        }

        return $this->roundResult($num1 + $num2);
    }

    /**
     * Calculate the difference
     * @param $num1, num2 numbers
     * @return float difference result
     */
    public function subtract($num1, $num2)
    {
        // Check for INF
        if (is_infinite($num1)) {
            throw new \InvalidArgumentException("num1 cannot be infinite");
        }

        if (is_infinite($num2)) {
            throw new \InvalidArgumentException("num2 cannot be infinite");
        }

        if (is_infinite($num1) && is_infinite($num2)) {
            throw new \InvalidArgumentException("Both numbers cannot be infinite");
        }

        // Check for invalid input type (array instead of number)
        if (is_array($num1) || is_array($num2) || !is_numeric($num1) || !is_numeric($num2)) {
            throw new \InvalidArgumentException("Both inputs must be numbers, not arrays or non-numeric values");
        }

        return $this->roundResult($num1 - $num2);
    }

    /**
     * Calculate the multiplication
     * @param $num1, num2 numbers
     * @return float multiplication result
     */
    public function multiply($num1, $num2)
    {
        // Check for INF
        if (is_infinite($num1) || is_infinite($num2)) {
            throw new \InvalidArgumentException("One or both values are infinite");
        }

        // Check for invalid input type (array instead of number)
        if (is_array($num1) || is_array($num2) || !is_numeric($num1) || !is_numeric($num2)) {
            throw new \InvalidArgumentException("Both inputs must be numbers, not arrays or non-numeric values");
        }

        return $this->roundResult($num1 * $num2);
    }

    /**
     * Calculate the division
     * @param $num1, num2 numbers
     * @return float division result
     */
    public function divide($num1, $num2)
    {
        // Check for INF
        if (is_infinite($num1) || is_infinite($num2)) {
            throw new \InvalidArgumentException("One or both values are infinite");
        }

        // Check for zero division
        if ($num2 == 0) {
            throw new \InvalidArgumentException("Division by zero");
        }

        // Check for invalid input type (array instead of number)
        if (is_array($num1) || is_array($num2) || !is_numeric($num1) || !is_numeric($num2)) {
            throw new \InvalidArgumentException("Both inputs must be numbers, not arrays or non-numeric values");
        }

        return $this->roundResult($num1 / $num2);
    }

    /**
     * Calculate the mean average
     * @param array $numbers Array of numbers
     * @return float Mean average
     */
    public function mean(array $numbers)
    {
        if (empty($numbers)) {
            throw new \InvalidArgumentException("Array cannot be empty");
        }

        // Check for invalid input type (array elements must be numbers)
        foreach ($numbers as $number) {
            if (!is_numeric($number)) {
                throw new \InvalidArgumentException("Array elements must be numeric values");
            }
        }

        // Check for INF in the array
        foreach ($numbers as $number) {
            if (is_infinite($number)) {
                throw new \InvalidArgumentException("Array cannot contain INF");
            }
        }

        // Calculate and round the result
        $result = array_sum($numbers) / count($numbers);
        return $this->roundResult($result);
    }

    /**
     * Calculate the median average
     * @param array $numbers Array of numbers
     * @return float Median average
     */
    public function median(array $numbers)
    {
        if (empty($numbers)) {
            throw new \InvalidArgumentException("Array cannot be empty");
        }

        // Check for invalid input type (array elements must be numbers)
        foreach ($numbers as $number) {
            if (!is_numeric($number)) {
                throw new \InvalidArgumentException("Array elements must be numeric values");
            }
        }

        // Check for INF in the array
        foreach ($numbers as $number) {
            if (is_infinite($number)) {
                throw new \InvalidArgumentException("Array cannot contain INF");
            }
        }

        sort($numbers);
        $size = count($numbers);
        if ($size % 2) {
            return $this->roundResult($numbers[$size / 2]);
        } else {
            return $this->roundResult($this->mean(
                array_slice($numbers, ($size / 2) - 1, 2)
            ));
        }
    }

    /**
     * Rounds the result to the defined precision
     * @param float $result The calculated result
     * @return float The rounded result
     */
    private function roundResult($result)
    {
        return round($result, self::ROUND_PRECISION);
    }
}

