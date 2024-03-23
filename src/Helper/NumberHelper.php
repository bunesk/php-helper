<?php

declare(strict_types=1);

namespace Bunesk\PhpHelper\Helper;

class NumberHelper
{
    /**
     * Divides two numbers, according to IEEE 754.
     *
     * @param float $dividend
     * @param float $divisor
     * @return float
     */
    public static function fdiv(float $dividend, float $divisor): float
    {
        return @($dividend / $divisor);
    }

    /**
     * Divides two numbers and returns the result and the rest.
     *
     * @param float $dividend
     * @param float $divisor
     * @return array
     */
    public static function divisionWithRest(float $dividend, float $divisor): array
    {
        return [\intval($dividend / $divisor), $dividend % $divisor];
    }

    /**
     * If number is even.
     *
     * @param int $number
     * @return float
     */
    public static function isEven(int $number): bool
    {
        return $number % 2 === 0;
    }

    /**
     * If number is odd.
     *
     * @param int $number
     * @return float
     */
    public static function isOdd(int $number): bool
    {
        return $number % 2 !== 0;
    }

    /**
     * If dividend is divideable by divisor with an even result.
     *
     * @param float $dividend
     * @param float $divisor
     * @return bool
     */
    public static function isDivideable(float $dividend, float $divisor): bool
    {
        return $dividend % $divisor === 0;
    }

    /**
     * Get fibonacci numbers until limit.
     *
     * @param int $limit
     * @return int[]
     */
    public static function fibonacci(int $limit): array
    {
        if ($limit < 1) {
            throw new \InvalidArgumentException('Limit must be greater than 0.');
        }

        if ($limit === 1) {
            return [0];
        }

        $fibonacciNumbers = [0, 1];

        for ($i = 2; $i < $limit; $i++) {
            $fibonacciNumbers[$i] = $fibonacciNumbers[$i - 1] + $fibonacciNumbers[$i - 2];
        }

        return $fibonacciNumbers;
    }

    /**
     * Uses the quadratic formula to return the results of the function.
     * Your function must have the structure ax² + bx + c = 0.
     * The result can either be none, one or two results.
     *
     * @param float $a
     * @param float $b
     * @param float $c
     * @return float[]
     */
    public static function quadraticFormula(float $a, float $b, float $c): array
    {
        $discriminant = $b**2 - 4 * $a * $c;

        if ($discriminant < 0) {
            return [];
        }

        $sqrtDiscriminant = \sqrt($discriminant);
        $x1 = (-$b + $sqrtDiscriminant) / (2 * $a);
        $x2 = (-$b - $sqrtDiscriminant) / (2 * $a);

        return \array_unique([$x1, $x2]);
    }

    /**
     * Get circumference of a circle by radius.
     *
     * @param float $radius
     * @return float
     */
    public static function circleCircumference(float $radius): float
    {
        return 2 * \M_PI * $radius;
    }

    /**
     * Get circle area by radius.
     *
     * @param float $radius
     * @return float
     */
    public static function circleArea(float $radius): float
    {
        return \M_PI * ($radius ** 2);
    }
}
