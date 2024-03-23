<?php

declare(strict_types=1);

namespace Bunesk\PhpHelper\Helper;

use Bunesk\PhpHelper\Traits\CaseConverter;
use Bunesk\PhpHelper\Traits\MultiByte;

class StringHelper
{
    use CaseConverter;
    use MultiByte;

    /**
     * If haystack contains needle.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function contains(string $haystack, string $needle): bool
    {
        return $needle === '' || \strpos($haystack, $needle) !== false;
    }

    /**
     * If haystack contains needle ignoring case.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function icontains(string $haystack, string $needle): bool
    {
        return self::contains(\strtolower($haystack), \strtolower($needle));
    }

    /**
     * If haystack starts with needle.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function startsWith(string $haystack, string $needle): bool
    {
        return \strncmp($haystack, $needle, \strlen($needle)) === 0;
    }

    /**
     * If haystack starts with needle ignoring case.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function istartsWith(string $haystack, string $needle): bool
    {
        return self::startsWith(\strtolower($haystack), \strtolower($needle));
    }

    /**
     * If haystack ends with needle.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function endsWith(string $haystack, string $needle): bool
    {
        $needleLength = \strlen($needle);

        if ($needleLength == 0) {
            return true;
        }

        return (\substr($haystack, -$needleLength) === $needle);
    }

    /**
     * If haystack ends with needle ignoring case.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function iendsWith(string $haystack, string $needle): bool
    {
        return self::endsWith(\strtolower($haystack), \strtolower($needle));
    }

    /**
     * Get the position of all occurrences of needle in haystack.
     *
     * @param string $haystack
     * @param string $needle
     * @return array
     */
    public static function indexOfAll(string $haystack, string $needle): array
    {
        $positions = [];
        $pos = \strpos($haystack, $needle);

        while ($pos !== false) {
            $positions[] = $pos;
            $pos = \strpos($haystack, $needle, $pos + 1);
        }

        return $positions;
    }

    /**
     * Get the position of the first occurrence of needle in haystack.
     *
     * @param string $haystack
     * @param string $needle
     * @param int $offset
     * @return int
     */
    public static function indexOf(string $haystack, string $needle, int $offset = 0): int
    {
        $pos = \strpos($haystack, $needle, $offset);

        if ($pos === false) {
            return -1;
        }

        return $pos;
    }

    /**
     * Get the position of the last occurrence of needle in haystack.
     *
     * @param string $haystack
     * @param string $needle
     * @param int $offset
     * @return int
     */
    public static function indexOfLast(string $haystack, string $needle, int $offset = 0): int
    {
        $pos = \strrpos($haystack, $needle, $offset);

        if ($pos === false) {
            return -1;
        }

        return $pos;
    }

    /**
     * Replace multiple occurencies of a string with another using key-value-pairs.
     *
     * @param array $replace
     * @param string $string
     * @return string
     */
    public static function replaceArray(array $replace, string $string) : string
    {
        return \str_replace(\array_keys($replace), \array_values($replace), $string);
    }

    /**
     * Ensures that the string starts with prefix.
     *
     * @param string $string
     * @param string $prefix
     * @return string
     */
    public static function ensureStart(string $string, string $prefix): string
    {
        if (self::startsWith($string, $prefix)) {
            return $string;
        }

        return $prefix . $string;
    }

    /**
     * Ensures that the string ends with suffix.
     *
     * @param string $string
     * @param string $suffix
     * @return string
     */
    public static function ensureEnd(string $string, string $suffix): string
    {
        if (self::endsWith($string, $suffix)) {
            return $string;
        }

        return $string . $suffix;
    }

    /**
     * Returns the part of haystack before the first occurrence of needle.
     *
     * @param string $haystack
     * @param string $needle
     * @return string
     */
    public static function before(string $haystack, string $needle): string
    {
        $pos = \strpos($haystack, $needle);

        if ($pos === false) {
            return $haystack;
        }

        return \substr($haystack, 0, $pos);
    }

    /**
     * Returns the part of haystack after the first occurrence of needle.
     *
     * @param string $haystack
     * @param string $needle
     * @return string
     */
    public static function after(string $haystack, string $needle): string
    {
        $pos = \strpos($haystack, $needle);

        if ($pos === false) {
            return '';
        }

        $startPosition = $pos + \strlen($needle);

        return \substr($haystack, $startPosition);
    }

    /**
     * Returns the part of haystack before the last occurrence of needle.
     *
     * @param string $haystack
     * @param string $needle
     * @return string
     */
    public static function beforeLast(string $haystack, string $needle): string
    {
        $pos = \strrpos($haystack, $needle);

        if ($pos === false) {
            return $haystack;
        }

        return \substr($haystack, 0, $pos);
    }

    /**
     * Returns the part of haystack after the last occurrence of needle.
     *
     * @param string $haystack
     * @param string $needle
     * @return string
     */
    public static function afterLast(string $haystack, string $needle): string
    {
        $pos = \strrpos($haystack, $needle);

        if ($pos === false) {
            return '';
        }

        $startPosition = $pos + \strlen($needle);

        return \substr($haystack, $startPosition);
    }

    /**
     * Changes / and \ to the os seperator.
     *
     * @param string $path
     * @return string
     */
    public static function toOsSeperator(string $path): string
    {
        return \str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
    }

    /**
     * Strips the class name from a namespace to just return the class name.
     *
     * @param string $class class name with namespace
     * @return string class name without namespace
     */
    public static function stripNamespaceFromClassName(string $class): string
    {
        $matches = [];
        if (\preg_match('@\\\\([\w]+)$@', $class, $matches)) {
            $class = $matches[1];
        }
        return $class;
    }

    /**
     * Removes line breaks (\n, \r) from a string.
     * You can optionally pass a replace string.
     *
     * @param string $string
     * @param string $replaceWith
     * @return string
     */
    public static function removeLineBreaks(string $string, string $replaceWith = ''): string
    {
        return \preg_replace("/\r|\n/", $replaceWith, $string);
    }

    /**
     * Removes line controls (\n, \r, \t) from a string.
     * You can optionally pass a replace string.
     *
     * @param string $string
     * @param string $replaceWith
     * @return string
     */
    public static function removeLineControls(string $string, string $replaceWith = ''): string
    {
        return \preg_replace('/\r|\n|\t/', $replaceWith, $string);
    }

    /**
     * Removes html comments (!-- --) from a string.
     * You can optionally pass a replace string.
     *
     * @param string $string
     * @param string $replaceWith
     * @return string
     */
    public static function removeHtmlComments(string $string, string $replaceWith = ''): string
    {
        return \preg_replace('/<!--(.*)-->/Uis', $replaceWith, $string);
    }

    /**
     * Zero fills a number to reach the passed length.
     *
     * @param string $string
     * @param int $length
     * @return string
     */
    public static function zeroFill(string $string, int $length): string
    {
        return \sprintf('%0' . \intval($length) . 'd', $string);
    }

    /**
     * Does the opposite of 'nl2br' by replacing breaks (br) with new lines (\n).
     *
     * @param string $string
     * @param bool $multiByte
     * @return string
     */
    public static function breakToNewLine(string $string, bool $multiByte = true): string
    {
        if ($multiByte) {
            return \mb_ereg_replace('\<br.*?\>',"\n", $string, 'i');
        }
        return \preg_replace('|\<br.*?\>|ui',"\n", $string);
    }

    /**
     * Whether a string is ASCII.
     *
     * @param string $string
     * @return boolean
     */
    public static function isAscii(string $string): bool
    {
        return \mb_check_encoding($string, 'ASCII');
    }

    /**
     * Whether a string is UTF-8.
     *
     * @param string $string
     * @return boolean
     */
    public static function isUtf8(string $string): bool
    {
        return \preg_match('//u', $string);
    }

    /**
     * Encodes a string to UTF-8.
     *
     * @param string $string
     * @param mixed $fromEncoding
     * @return string|null
     */
    public static function encodeUtf8(string $string, ?string $fromEncoding = null): ?string
    {
        $encodedString = \mb_convert_encoding($string, 'UTF-8', $fromEncoding);

        if ($encodedString === false) {
            return null;
        }

        return (string) $encodedString;
    }

    /**
     * Decodes a UTF-8 string.
     *
     * @param string $string
     * @param string $toEncoding
     * @return string|null
     */
    public static function decodeUtf8(string $string, string $toEncoding = 'ISO-8859-1'): ?string
    {
        $decodedString = \mb_convert_encoding($string, $toEncoding, 'UTF-8');

        if ($decodedString === false) {
            return null;
        }

        return (string) $decodedString;
    }

    /**
     * If a string is a valid json representation.
     *
     * @param string $json
     * @param string $depth
     * @param int $flags
     * @return bool
     */
    public static function jsonValidate(string $json, int $depth = 512, int $flags = 0): bool
    {
        if ($flags !== 0 && \defined('JSON_INVALID_UTF8_IGNORE') && $flags !== \JSON_INVALID_UTF8_IGNORE ) {
            throw new \ValueError('jsonValidate(): Argument #3 ($flags) must be a valid flag (allowed flags: JSON_INVALID_UTF8_IGNORE)');
        }

        if ($depth <= 0) {
            throw new \ValueError('jsonValidate(): Argument #2 ($depth) must be greater than 0');
        }

        $maxDepth = 0x7FFFFFFF;
        if ($depth > $maxDepth) {
            throw new \ValueError(\sprintf('jsonValidate(): Argument #2 ($depth) must be less than %d', $maxDepth));
        }

        \json_decode($json, null, $depth, $flags);

        return \json_last_error() === \JSON_ERROR_NONE;
    }

    /**
     * Parses a url to an array of parts.
     *
     * @param string $url
     * @return array
     */
    public static function parseUrl(string $url): array
    {
        $r = '!(?:(\w+)://)?(?:(\w+)\:(\w+)@)?([^/:]+)?(?:\:(\d*))?([^#?]+)?(?:\?([^#]+))?(?:#(.+$))?!i';
        $out = [];

        if (\preg_match($r, $url, $out)) {
            return [
                'full' => $out[0],
                'scheme' => $out[1],
                'username' => $out[2],
                'password' => $out[3],
                'domain' => $out[4],
                'host' => $out[4],
                'port' => $out[5],
                'path' => $out[6],
                'query' => $out[7],
                'fragment' => $out[8]
            ];
        }

        return $out;
    }

    /**
     * Unparses a url array back to a string.
     *
     * @param array $parsedUrl
     * @return string
     */
    public static function unparseUrl(array $parsedUrl): string
    {
        $scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] . '://' : '';
        $host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
        $port = isset($parsedUrl['port']) ? ':' . $parsedUrl['port'] : '';
        $user  = isset($parsedUrl['user']) ? $parsedUrl['user'] : '';
        $pass = isset($parsedUrl['pass']) ? ':' . $parsedUrl['pass']  : '';
        $pass = ($user || $pass) ? "$pass@" : '';
        $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
        $query = isset($parsedUrl['query']) ? '?' . $parsedUrl['query'] : '';
        $fragment = isset($parsedUrl['fragment']) ? '#' . $parsedUrl['fragment'] : '';

        return "{$scheme}{$user}{$pass}{$host}{$port}{$path}{$query}{$fragment}";
    }

    /**
     * Parses a csv string to an array.
     *
     * @param string $csvString
     * @param string $delimiter
     * @param bool $skipEmptyLines
     * @param bool $trimFields
     * @return array
     */
    public static function parseCsv(string $csvString, string $delimiter = ',', bool $skipEmptyLines = true, bool $trimFields = true): array
    {
        $enc = \preg_replace('/(?<!")""/', '!!Q!!', $csvString);
        $enc = \preg_replace_callback(
            '/"(.*?)"/s',
            function ($field) {
                return \urlencode(self::encodeUtf8($field[1]));
            },
            $enc
        );
        $lines = \preg_split($skipEmptyLines ? ($trimFields ? '/( *\R)+/s' : '/\R+/s') : '/\R/s', $enc);

        return \array_map(
            function ($line) use ($delimiter, $trimFields) {
                $fields = $trimFields ? \array_map('trim', \explode($delimiter, $line)) : \explode($delimiter, $line);
                return \array_map(
                    function ($field) {
                        return \str_replace('!!Q!!', '"', self::decodeUtf8(\urldecode($field)));
                    },
                    $fields
                );
            },
            $lines
        );
    }
}
