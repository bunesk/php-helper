<?php

declare(strict_types=1);

namespace Bunesk\PhpHelper\Helper;

class ArrayHelper
{
    /**
     * Returns the key of the first element of an array.
     *
     * @param array $array
     * @return string|int
     */
    public static function firstKey(array $array)
    {
        foreach ($array as $key => $value) {
            return $key;
        }
    }

    /**
     * Returns the value of the first element of an array.
     *
     * @param array $array
     * @return mixed
     */
    public static function firstValue(array $array)
    {
        return $array[static::firstKey($array)];
    }

    /**
     * Returns the key of the last element of an array.
     *
     * @param array $array
     * @return string|int|null
     */
    public static function lastKey(array $array)
    {
        return \key(\array_slice($array, -1, 1, true));
    }

    /**
     * Returns the value of the last element of an array.
     *
     * @param array $array
     * @return mixed
     */
    public static function lastValue(array $array)
    {
        return $array[self::lastKey($array)];
    }

    /**
     * Verifies that the variable is countable.
     *
     * @param mixed $value
     * @return bool
     */
    public static function isCountable(mixed $value): bool
    {
        return \is_array($value) || $value instanceof \Countable || $value instanceof \ResourceBundle || $value instanceof \SimpleXmlElement;
    }

    /**
     * If the array is a list by just containing incremental numeric keys.
     *
     * @param array $array
     * @return bool
     */
    public static function isList(array $array): bool
    {
        if ($array === [] || $array === \array_values($array)) {
            return true;
        }

        $nextKey = -1;

        foreach ($array as $key => $value) {
            if ($key !== ++$nextKey) {
                return false;
            }
        }

        return true;
    }

    /**
     * If the array is associative by not just containing incremental numeric keys.
     *
     * @param array $array
     * @return bool
     */
    public static function isAssociative(array $array): bool
    {
        return !self::isList($array);
    }

    /**
     * Converts an object to an array.
     *
     * @param mixed $object
     * @return mixed
     */
    public static function objectToArray($object)
    {
        return \json_decode(\json_encode($object), true);
    }

    /**
     * Merge arrays recursive by overwriting the value in the first array with the duplicate
     * value in the second array.
     *
     * @param array $array1
     * @param array $array2
     * @return array
     */
    public static function mergeRecursiveDistinct(array $array1, array $array2): array
    {
        $merged = $array1;

        foreach ($array2 as $key => &$value) {
            if (\is_array($value) && isset($merged[$key]) && \is_array($merged[$key])) {
                $merged[$key] = self::mergeRecursiveDistinct($merged[$key], $value);
            } else {
                $merged[$key] = $value;
            }
        }

        return $merged;
    }
}
