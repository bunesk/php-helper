<?php

declare(strict_types=1);

namespace Bunesk\PhpHelper\Helper;

class DateTimeHelper
{
    /**
     * Converts a php unix timestamp to a javascript timestamp in milliseconds.
     *
     * @param int $timestamp php unix timestamp
     * @return int javascript timestamp (ms)
     */
    public static function phpToJavascript(int $timestamp): int
    {
        return ($timestamp > 1000) ? $timestamp * 1000 : 0;
    }

    /**
     * Converts a javascript unix timestamp to a php timestamp in seconds.
     *
     * @param int $timestamp javascript unix timestamp
     * @return int php timestamp
     */
    public static function javascriptToPhp(int $timestamp): int
    {
        return ($timestamp > 1000) ? $timestamp / 1000 : 0;
    }

    /**
     * Returns the current javascript unix timestamp in milliseconds.
     *
     * @return int javascript timestamp (ms)
     */
    public static function timeMillis(): int
    {
        return (int) \round(\microtime(true) * 1000);
    }

    /**
     * Parses a string into a new DateTime object according to the specified format.
     * Returns null instead of false compared to 'DateTime::createFromFormat'.
     *
     * @param string $format
     * @param string $datetime
     * @param \DateTimeZone|null $timezone
     * @return \DateTime|null
     */
    public static function createFromFormat(string $format, string $datetime, ?\DateTimeZone $timezone = null): ?\DateTime
    {
        $formattedDate = \DateTime::createFromFormat($format, $datetime, $timezone);

        if ($formattedDate === false) {
            return null;
        }

        return $formattedDate;
    }
}
