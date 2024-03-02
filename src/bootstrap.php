<?php

declare(strict_types=1);

use Bunesk\PhpHelper\Debug;
use Bunesk\PhpHelper\Helper\ArrayHelper;
use Bunesk\PhpHelper\Helper\DateTimeHelper;
use Bunesk\PhpHelper\Helper\NumberHelper;
use Bunesk\PhpHelper\MySql;
use Bunesk\PhpHelper\Helper\StringHelper;

if (!function_exists('array_value_first')) {
    function array_value_first(array $array)
    {
        return ArrayHelper::firstValue($array);
    }
}

if (!function_exists('array_value_last')) {
    function array_value_last(array $array)
    {
        return ArrayHelper::lastValue($array);
    }
}

if (!function_exists('array_merge_recursive_distinct')) {
    function array_merge_recursive_distinct(array $array1, array $array2)
    {
        return ArrayHelper::mergeRecursiveDistinct($array1, $array2);
    }
}

if (!function_exists('time_millis')) {
    function time_millis(): int
    {
        return DateTimeHelper::timeMillis();
    }
}

if (!function_exists('str_icontains')) {
    function str_icontains(string $haystack, string $needle): bool
    {
        return StringHelper::icontains($haystack, $needle);
    }
}

if (!function_exists('str_istarts_with')) {
    function str_istarts_with(string $haystack, string $needle): bool
    {
        return StringHelper::istartsWith($haystack, $needle);
    }
}

if (!function_exists('str_iends_with')) {
    function str_iends_with(string $haystack, string $needle): bool
    {
        return StringHelper::iendsWith($haystack, $needle);
    }
}

if (!function_exists('str_replace_array')) {
    function str_replace_array(array $replace, string $string): string
    {
        return StringHelper::replaceArray($replace, $string);
    }
}

if (!function_exists('br2nl')) {
    function br2nl(string $string, bool $multiByte): string
    {
        return StringHelper::breakToNewLine($string, $multiByte);
    }
}

if (!function_exists('is_ascii') && function_exists('mb_substr')) {
    function is_ascii(string $string): bool
    {
        return StringHelper::isAscii($string);
    }
}

if (!function_exists('is_utf8')) {
    function is_utf8(string $string): bool
    {
        return StringHelper::isUtf8($string);
    }
}

if (!function_exists('unparse_url')) {
    function unparse_url(array $parsedUrl): string
    {
        return StringHelper::unparseUrl($parsedUrl);
    }
}

if (!function_exists('mb_str_replace') && function_exists('mb_substr')) {
    function mb_str_replace(string $needle, string $replacement, string $haystack): string
    {
        return StringHelper::multiByteReplace($needle, $replacement, $haystack);
    }
}

if (!function_exists('mb_trim') && function_exists('mb_substr')) {
    function mb_trim(string $string, ?string $characterMask = null): string
    {
        return StringHelper::multiByteTrim($string, $characterMask);
    }
}

if (!function_exists('mb_strrev') && function_exists('mb_substr')) {
    function mb_strrev(string $string): string
    {
        return StringHelper::multiByteReverse($string);
    }
}

if (!function_exists('mb_str_split') && function_exists('mb_substr')) {
    function mb_str_split(string $string, int $length = 1, ?string $encoding = null): array
    {
        return StringHelper::multiByteSplit($string, $length, $encoding);
    }
}

if (!function_exists('mb_parse_url') && function_exists('mb_substr')) {
    function mb_parse_url(string $url): array
    {
        return StringHelper::multiByteParseUrl($url);
    }
}

if (!function_exists('dd')) {
    function dd(...$vars): array
    {
        return Debug::dd($vars);
    }
}

if (!function_exists('get_class_info')) {
    function get_class_info(object $class): array
    {
        return Debug::getClassInfo($class);
    }
}

if (\PHP_VERSION_ID >= 80300) {
    return;
}

if (!function_exists('json_validate')) {
    function json_validate(string $json, int $depth = 512, int $flags = 0): bool
    {
        return StringHelper::jsonValidate($json, $depth, $flags);
    }
}

if (!function_exists('mb_str_pad') && function_exists('mb_substr')) {
    function mb_str_pad(string $string, int $length, string $pad_string = ' ', int $pad_type = STR_PAD_RIGHT, ?string $encoding = null): string
    {
        return StringHelper::multiBytePad($string, $length, $pad_string, $pad_type, $encoding);
    }
}

if (\PHP_VERSION_ID >= 80200) {
    return;
}

if (!function_exists('mysqli_execute_query')) {
    function mysqli_execute_query(\mysqli $mysqli, string $sql, ?array $params = null): \mysqli_stmt|false
    {
        return MySql::executeQuery($mysqli, $sql, $params) ?? false;
    }
}

if (\PHP_VERSION_ID >= 80100) {
    return;
}

if (defined('MYSQLI_REFRESH_SLAVE') && !defined('MYSQLI_REFRESH_REPLICA')) {
    define('MYSQLI_REFRESH_REPLICA', 64);
}

if (!function_exists('array_is_list')) {
    function array_is_list(array $array): bool
    {
        return ArrayHelper::isList($array);
    }
}

if (\PHP_VERSION_ID >= 80000) {
    return;
}

if (!defined('FILTER_VALIDATE_BOOL') && defined('FILTER_VALIDATE_BOOLEAN')) {
    define('FILTER_VALIDATE_BOOL', \FILTER_VALIDATE_BOOLEAN);
}

if (!function_exists('fdiv')) {
    function fdiv(float $num1, float $num2): float
    {
        return NumberHelper::fdiv($num1, $num2);
    }
}

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return StringHelper::contains($haystack, $needle);
    }
}

if (!function_exists('str_starts_with')) {
    function str_starts_with(string $haystack, string $needle): bool
    {
        return StringHelper::startsWith($haystack, $needle);
    }
}

if (!function_exists('str_ends_with')) {
    function str_ends_with(string $haystack, string $needle): bool
    {
        return StringHelper::endsWith($haystack, $needle);
    }
}

if (\PHP_VERSION_ID >= 70400) {
    return;
}

if (!function_exists('mb_str_split') && function_exists('mb_substr')) {
    function mb_str_split(string $string, int $length = 1, ?string $encoding = null)
    {
        return StringHelper::multiByteSplit($string, $length, $encoding);
    }
}

if (\PHP_VERSION_ID >= 70300) {
    return;
}

if (!function_exists('is_countable')) {
    function is_countable($value): bool {
        return ArrayHelper::isCountable($value);
    }
}

if (!function_exists('array_key_first')) {
    function array_key_first(array $array)
    {
        return ArrayHelper::firstKey($array);
    }
}

if (!function_exists('array_key_last')) {
    function array_key_last(array $array)
    {
        return ArrayHelper::lastKey($array);
    }
}

if (\PHP_VERSION_ID >= 70200) {
    return;
}

if (!defined('PHP_FLOAT_DIG')) {
    define('PHP_FLOAT_DIG', 15);
}

if (!defined('PHP_FLOAT_EPSILON')) {
    define('PHP_FLOAT_EPSILON', 2.2204460492503E-16);
}

if (!defined('PHP_FLOAT_MIN')) {
    define('PHP_FLOAT_MIN', 2.2250738585072E-308);
}

if (!defined('PHP_FLOAT_MAX')) {
    define('PHP_FLOAT_MAX', 1.7976931348623157E+308);
}

if (!function_exists('utf8_encode') && function_exists('mb_substr')) {
    function utf8_encode(string $string): string
    {
        return StringHelper::encodeUtf8($string) ?? $string;
    }
}

if (!function_exists('utf8_decode') && function_exists('mb_substr')) {
    function utf8_decode(string $string): string
    {
        return StringHelper::decodeUtf8($string) ?? $string;
    }
}
