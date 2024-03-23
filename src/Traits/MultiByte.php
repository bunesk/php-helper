<?php

declare(strict_types=1);

namespace Bunesk\PhpHelper\Traits;

trait MultiByte
{
    /**
     * Searches for needle in the multi-byte haystack and replaces it with the replacement string.
     *
     * @param string $needle
     * @param string $replacement
     * @param string $haystack
     * @return string
     */
    public static function multiByteReplace(string $needle, string $replacement, string $haystack) : string
    {
        return \implode($replacement, \mb_split($needle, $haystack));
    }

    /**
     * Trims a multi-byte string by removing whitespaces etc.
     *
     * @param string $string string to trim
     * @param string|null $characterMask characters to trim (default: ' ', \n, \r, \t, \v)
     * @return string
     */
    public static function multiByteTrim(string $string, ?string $characterMask = null) : string
    {
        if (\is_null($characterMask)) {
            return \trim($string);
        } else {
            $characterMask = \preg_quote($characterMask, '/');
            return \preg_replace("/(^[{$characterMask}]+)|([{$characterMask}]+$)/us", '', $string);
        }
    }

    /**
     * Pad a multi-byte string to a certain length with another string.
     *
     * @param string $string
     * @param int $length
     * @param string $padString
     * @param int $padType
     * @param string|null $encoding
     * @return string
     */
    public static function multiBytePad(string $string, int $length, string $padString = ' ', int $padType = \STR_PAD_RIGHT, string $encoding = null): string
    {
        if (!\in_array($padType, [\STR_PAD_RIGHT, \STR_PAD_LEFT, \STR_PAD_BOTH], true)) {
            throw new \ValueError('multiBytePad(): Argument #4 ($pad_type) must be STR_PAD_LEFT, STR_PAD_RIGHT, or STR_PAD_BOTH');
        }

        if ($encoding === null) {
            $encoding = \mb_internal_encoding();
        }

        try {
            $validEncoding = @mb_check_encoding('', $encoding);@\mb_check_encoding('', $encoding);
        } catch (\ValueError $e) {
            throw new \ValueError(\sprintf('multiBytePad(): Argument #5 ($encoding) must be a valid encoding, "%s" given', $encoding));
        }

        if (!$validEncoding) {
            throw new \ValueError(sprintf('multiBytePad(): Argument #5 ($encoding) must be a valid encoding, "%s" given', $encoding));
        }

        if (\mb_strlen($padString, $encoding) <= 0) {
            throw new \ValueError('multiBytePad(): Argument #3 ($padString) must be a non-empty string');
        }

        $paddingRequired = $length - \mb_strlen($string, $encoding);

        if ($paddingRequired < 1) {
            return $string;
        }

        switch ($padType) {
            case \STR_PAD_LEFT:
                return \mb_substr(\str_repeat($padString, $paddingRequired), 0, $paddingRequired, $encoding).$string;
            case \STR_PAD_RIGHT:
                return $string.\mb_substr(\str_repeat($padString, $paddingRequired), 0, $paddingRequired, $encoding);
            default:
                $leftPaddingLength = \floor($paddingRequired / 2);
                $rightPaddingLength = $paddingRequired - $leftPaddingLength;

                return \mb_substr(\str_repeat($padString, (int) $leftPaddingLength), 0, (int) $leftPaddingLength, $encoding)
                .$string.\mb_substr(\str_repeat($padString, $rightPaddingLength), 0, $rightPaddingLength, $encoding);
        }
    }

    /**
     * Reverses the order of the characters of a multi-byte string.
     *
     * @param string $string
     * @return string
     */
    public static function multiByteReverse(string $string): string
    {
        $reversedString = '';

        for ($i = \mb_strlen($string); $i >= 0; $i--) {
            $reversedString .= \mb_substr($string, $i, 1);
        }

        return $reversedString;
    }

    /**
     * Splits a multi-byte string.
     *
     * @param string $string
     * @param int $length
     * @param string|null $encoding
     * @return string[]
     */
    public static function multiByteSplit(string $string, int $length = 1, ?string $encoding = null): array
    {
        $split = [];

        if (empty($string)) {
            return $split;
        }

        $mbLength = \mb_strlen($string, $encoding);

        for ($pi = 0; $pi < $mbLength; $pi += $length){
            $substr = \mb_substr($string, $pi,$length,$encoding);

            if (!empty($substr)){
                $split[] = $substr;
            }
        }

        return $split;
    }

    /**
     * Parses a multi-byte url string to an array of parts.
     *
     * @param string $url
     * @return array
     */
    public static function multiByteParseUrl(string $url): array
    {
        $encodedUrl = \preg_replace_callback(
            '%[^:/@?&=#]+%usD',
            function ($matches) {
                return \urlencode($matches[0]);
            },
            $url
        );

        $parts = self::parseUrl($encodedUrl);

        if ($parts === false) {
            throw new \InvalidArgumentException('Malformed URL: ' . $url);
        }

        foreach ($parts as $name => $value) {
            $parts[$name] = \urldecode($value);
        }

        return $parts;
    }
}
