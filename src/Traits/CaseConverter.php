<?php

declare(strict_types=1);

namespace Bunesk\PhpHelper\Traits;

trait CaseConverter
{
    /**
     * Converts a snake_case string to camelCase.
     *
     * @param string $string
     * @return string
     */
    public static function snakeToCamelCase(string $string): string
    {
        return \lcfirst(\str_replace('_', '', \ucwords($string, '_')));
    }

    /**
     * Converts a kebab-case string to camelCase.
     *
     * @param string $string
     * @return string
     */
    public static function kebabToCamelCase(string $string): string
    {
        return \lcfirst(\str_replace('-', '', \ucwords($string, '-')));
    }

    /**
     * Converts a PascalCase string to camelCase.
     *
     * @param string $string
     * @return string
     */
    public static function pascalToCamelCase(string $string): string
    {
        return \lcfirst($string);
    }

    /**
     * Converts a camelCase string to snake_case.
     *
     * @param string $string
     * @return string
     */
    public static function camelToSnakeCase(string $string): string
    {
        return \strtolower(\preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string));
    }

    /**
     * Converts a kebab-case string to snake_case.
     *
     * @param string $string
     * @return string
     */
    public static function kebabToSnakeCase(string $string): string
    {
        return \str_replace('-', '_', $string);
    }

    /**
     * Converts a PascalCase string to snake_case.
     *
     * @param string $string
     * @return string
     */
    public static function pascalToSnakeCase(string $string): string
    {
        return \strtolower(\preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string));
    }

    /**
     * Converts a snake-case string to kebab-case.
     *
     * @param string $string
     * @return string
     */
    public static function snakeToKebabCase(string $string): string
    {
        return \str_replace('_', '-', $string);
    }

    /**
     * Converts a camelCase string to kebab-case.
     *
     * @param string $string
     * @return string
     */
    public static function camelToKebabCase(string $string): string
    {
        $kebab = \preg_replace_callback('/[A-Z]/', function(array $match) {
            return '-' . \strtolower($match[0]);
        }, $string);

        return \preg_replace('/-+/', '-', $kebab);
    }

    /**
     * Converts a PascalCase string to kebab-case.
     *
     * @param string $string
     * @return string
     */
    public static function pascalToKebabCase(string $string): string
    {
        $kebab = \preg_replace_callback('/[A-Z]/', function(array $match) {
            return '-' . \strtolower($match[0]);
        }, \lcfirst($string));

        return \preg_replace('/-+/', '-', $kebab);
    }

    /**
     * Converts a camelCase string to PascalCase.
     *
     * @param string $string
     * @return string
     */
    public static function camelToPascalCase(string $string): string
    {
        return \ucfirst($string);
    }

    /**
     * Converts a snake_case string to PascalCase.
     *
     * @param string $string
     * @return string
     */
    public static function snakeToPascalCase(string $string): string
    {
        return \str_replace('_', '', \ucwords($string, '_'));
    }

    /**
     * Converts a kebab-case string to PascalCase.
     *
     * @param string $string
     * @return string
     */
    public static function kebabToPascalCase(string $string): string
    {
        $words = \explode('-', $string);
        $pascal = \array_map('ucfirst', $words);

        return \implode('', $pascal);
    }
}
