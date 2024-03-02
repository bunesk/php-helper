<?php

declare(strict_types=1);

namespace Bunesk\PhpHelper;

class RandomGenerator
{
    /**
     * Generates a random integer number with a length up to 18 digits.
     *
     * @param int $length
     * @return int
     */
    public static function number(int $length): int
    {
        if ($length <= 0) {
            throw new \InvalidArgumentException('Length must be greater than 0.');
        }

        if ($length > 18) {
            throw new \InvalidArgumentException('Length must be smaller than 18.');
        }

        $min = 10 ** ($length - 1);
        $max = (10 ** $length) - 1;

        return \random_int($min, $max);
    }

    /**
     * Generates a random number as string.
     *
     * @param int $length
     * @return int
     */
    public static function largeNumber(int $length): string
    {
        if ($length <= 0) {
            throw new \InvalidArgumentException('Length must be greater than 0.');
        }

        $randomNumber = '';

        for ($i = 0; $i < $length; $i++) {
            $randomDigit = \random_int(0, 9);
            $randomNumber .= $randomDigit;
        }

        return $randomNumber;
    }

    /**
     * Generates a random hexadecimal number.
     *
     * @param int $length
     * @return string
     */
    public static function hexadecimalNumber(int $length): string {
        if ($length <= 0) {
            throw new \InvalidArgumentException('Length must be greater than 0.');
        }

        $byteLength = \ceil($length / 2);
        $randomBytes = \random_bytes((int) $byteLength);
        $hexCode = \substr(\bin2hex($randomBytes), 0, $length);

        return $hexCode;
    }

    /**
     * Generates a random uuid version 4.
     *
     * @return string
     */
    public static function uuidV4(): string
    {
        $data = \random_bytes(16);

        $data[6] = \chr(\ord($data[6]) & 0x0f | 0x40);
        $data[8] = \chr(\ord($data[8]) & 0x3f | 0x80);

        $uuid = \vsprintf('%s%s-%s-%s-%s-%s%s%s', \str_split(\bin2hex($data), 4));

        return $uuid;
    }

    /**
     * Generates a random password.
     *
     * @param integer $length
     * @param boolean $useUppercase
     * @param boolean $useLowercase
     * @param boolean $useNumbers
     * @param boolean $useSpecialChars
     * @return string
     */
    public static function password(
        int $length = 12,
        bool $useUppercase = true,
        bool $useLowercase = true,
        bool $useNumbers = true,
        bool $useSpecialChars = false
    ): string
    {
        if ($length <= 0) {
            throw new \InvalidArgumentException('Length must be greater than 0.');
        }

        $uppercaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';
        $numberChars = '0123456789';
        $specialChars = '!@#$%^&*()-_=+[]{}|;:,.<>?';

        $characters = '';

        if ($useUppercase) {
            $characters .= $uppercaseChars;
        }
        if ($useLowercase) {
            $characters .= $lowercaseChars;
        }
        if ($useNumbers) {
            $characters .= $numberChars;
        }
        if ($useSpecialChars) {
            $characters .= $specialChars;
        }

        if (empty($characters)) {
            throw new \InvalidArgumentException('Invalid character set. Please enable at least one character type.');
        }

        $password = '';
        $max = \strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[\random_int(0, $max)];
        }

        return $password;
    }
}
