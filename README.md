# PHP Helper

A bunch of useful php helper classes.

## Helpers

### ArrayHelper

| Functions                                     | Description                                                                  |
| --------------------------------------------- | ---------------------------------------------------------------------------- |
| `firstKey(array $array): mixed`               | Returns the key of the first element of an array.                            |
| `firstValue(array $array): mixed`             | Returns the value of the first element of an array.                          |
| `lastKey(array $array): mixed`                | Returns the key of the last element of an array.                             |
| `lastValue(array $array): mixed`              | Returns the value of the last element of an array.                           |
| `isCountable(mixed $value): bool`             | Verifies that the variable is countable.                                     |
| `isList(array $array): bool`                  | If the array is a list by just containing incremental numeric keys.          |
| `isAssociative(array $array): bool`           | If the array is associative by not just containing incremental numeric keys. |
| `objectToArray($object): mixed`               | Converts an object to an array.                                              |
| `mergeRecursiveDistinct(array $array): array` | Merge arrays recursive by overwriting the value in the first array with the duplicate value in the second array. |

### DateTimeHelper

| Functions                       | Description                                                              |
| ------------------------------- | ------------------------------------------------------------------------ |
| `phpToJavascript(array $array): int` | Converts a php unix timestamp to a javascript timestamp in milliseconds. |
| `javascriptToPhp(array $array): int` | Converts a javascript unix timestamp to a php timestamp in seconds.      |
| `timeMillis(): int`                  | Returns the current javascript unix timestamp in milliseconds.           |
| `createFromFormat(string $format, string $datetime, ?\DateTimeZone $timezone = null): ?\DateTime` | Parses a string into a new DateTime object according to the specified format. |

### NumberHelper

| Functions                                                  | Description                                                       |
| ---------------------------------------------------------- | ----------------------------------------------------------------- |
| `fdiv(float $dividend, float $divisor): float`             | Divides two numbers, according to IEEE 754.                       |
| `divisionWithRest(float $dividend, float $divisor): array` | Divides two numbers and returns the result and the rest.          |
| `isEven(int $number): bool`                                | If number is even.                                                |
| `isOdd(int $number): bool`                                 | If number is odd.                                                 |
| `isDivideable(float $dividend, float $divisor): bool`      | If dividend is divideable by divisor with an even result.         |
| `fibonacci(int $limit): int[]`                             | Get fibonacci numbers until limit.                                |
| `quadraticFormula(float $a, float $b, float $c): float[]`  | Uses the quadratic formula to return the results of the function. |
| `circleCircumference(float $radius): float`                | Get circumference of a circle by radius.                          |
| `circleArea(float $radius): float`                         | Get circle area by radius.                                        |

### StringHelper

| Functions                                                                 | Description                                                                      |
| ------------------------------------------------------------------------- | -------------------------------------------------------------------------------- |
| `contains(string $haystack, string $needle): bool`                        | If haystack contains needle.                                                     |
| `icontains(string $haystack, string $needle): bool`                       | If haystack contains needle ignoring case.                                       |
| `startsWith(string $haystack, string $needle): bool`                      | If haystack starts with needle.                                                  |
| `istartsWith(string $haystack, string $needle): bool`                     | If haystack starts with needle ignoring case.                                    |
| `endsWith(string $haystack, string $needle): bool`                        | If haystack ends with needle.                                                    |
| `iendsWith(string $haystack, string $needle): bool`                       | If haystack ends with needle ignoring case.                                      |
| `indexOfAll(string $haystack, string $needle): array`                     | Get the position of all occurrences of needle in haystack.                       |
| `indexOf(string $haystack, string $needle, int $offset = 0): int`         | Get the position of the first occurrence of needle in haystack.                  |
| `indexOfLast(string $haystack, string $needle, int $offset = 0): int`     | Get the position of the last occurrence of needle in haystack.                   |
| `replaceArray(array $replace, string $string)`                            | Replace multiple occurencies of a string with another using key-value-pairs.     |
| `ensureStart(string $string, string $prefix): string`                     | Ensures that the string starts with prefix.                                      |
| `ensureEnd(string $string, string $suffix): string`                       | Ensures that the string ends with suffix.                                        |
| `before(string $haystack, string $needle): string`                        | Returns the part of haystack before the first occurrence of needle.              |
| `after(string $haystack, string $needle): string`                         | Returns the part of haystack after the first occurrence of needle.               |
| `beforeLast(string $haystack, string $needle): string`                    | Returns the part of haystack before the last occurrence of needle.               |
| `afterLast(string $haystack, string $needle): string`                     | Returns the part of haystack after the last occurrence of needle.                |
| `snakeToCamelCase(string $string): string`                                | Converts a `snake_case` string to `camelCase`.                                   |
| `kebabToCamelCase(string $string): string`                                | Converts a `kebab-case` string to `camelCase`.                                   |
| `pascalToCamelCase(string $string): string`                               | Converts a `PascalCase` string to `camelCase`.                                   |
| `camelToSnakeCase(string $string): string`                                | Converts a `camelCase` string to `snake_case`.                                   |
| `kebabToSnakeCase(string $string): string`                                | Converts a `kebab-case` string to `snake_case`.                                  |
| `pascalToSnakeCase(string $string): string`                               | Converts a `PascalCase` string to `snake_case`.                                  |
| `snakeToKebabCase(string $string): string`                                | Converts a `snake-case` string to `kebab-case`.                                  |
| `camelToKebabCase(string $string): string`                                | Converts a `camelCase` string to `kebab-case`.                                   |
| `pascalToKebabCase(string $string): string`                               | Converts a `PascalCase` string to `kebab-case`.                                  |
| `camelToPascalCase(string $string): string`                               | Converts a `camelCase` string to `PascalCase`.                                   |
| `snakeToPascalCase(string $string): string`                               | Converts a `snake_case` string to `PascalCase`.                                  |
| `toOsSeperator(string $path)`                                             | Changes `/` and `\` to the os seperator.                                         |
| `stripNamespaceFromClassName(string $class)`                              | Strips the class name from a namespace to just return the class name.            |
| `removeLineBreaks(string $string, string $replaceWith = '')`              | Removes line breaks (`\n`, `\r`) from a string.                                  |
| `removeLineControls(string $string, string $replaceWith = '')`            | Removes line breaks (`\n`, `\r`, `\t`) from a string.                            |
| `removeHtmlComments(string $string, string $replaceWith = '')`            | Removes html comments (`<!-- -->`) from a string.                                |
| `zeroFill(string $string, int $length)`                                   | Zero fills a number to reach the passed length.                                  |
| `breakToNewLine(string $string, bool $multiByte = true)`                  | Does the opposite of `nl2br` by replacing breaks (`<br>`) with new lines (`\n`). |
| `isAscii(string $string)`                                                 | Whether a string is ASCII.                                                       |
| `isUtf8(string $string)`                                                  | Whether a string is UTF-8.                                                       |
| `encodeUtf8(string $string, ?string $fromEncoding = null): ?string`       | Encodes a string to UTF-8.                                                       |
| `decodeUtf8(string $string, string $toEncoding = 'ISO-8859-1'): ?string`  | Decodes a UTF-8 string.                                                          |
| `jsonValidate(string $json, int $depth = 512, int $flags = 0)`            | If a string is a valid json representation.                                      |
| `parseUrl(string $url): array`                                            | Parses a url to an array of parts.                                               |
| `unparseUrl(array $parsedUrl): string`                                    | Unparses a url array back to a string.                                           |
| `parseCsv(string $csvString, string $delimiter = ',', bool $skipEmptyLines = true, bool $trimFields = true): array` | Parses a csv string to an array.       |
| `multiByteReplace(string $needle, string $replacement, string $haystack)` | Replaces needle in multi-byte haystack with replacement string.                  |
| `multiByteTrim(string $string, ?string $characterMask = null)`            | Trims a multi-byte string by removing whitespaces etc.                           |
| `multiBytePad(string $string, int $length, string $padString = ' ', int $padType = \STR_PAD_RIGHT, string $encoding = null)` | Pad a multi-byte string to a certain length with another string. |
| `multiByteReverse(string $string): string`                                | Reverses the order of the characters of a multi-byte string.                     |
| `multiByteSplit(string $string, int $length = 1, ?string $encoding = null): array` | Splits a multi-byte string.                                             |
| `multiByteParseUrl(string $url): array`                                   | Parses a multi-byte url string to an array of parts.                             |

## Curl

| Functions                                   | Description                                                                                        |
| ------------------------------------------- | -------------------------------------------------------------------------------------------------- |
| `execute(string $url, array $options = [])` | Executes a curl request. Returns an array with the structure: [success => boolean, data => string] |

## Debug

| Functions                                                                            | Description                                                                           |
| ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------- |
| `dd(...$vars): void`                                                                 | Dumps the passed variables and dies afterwards.                                       |
| `getClassInfo(object $class): array`                                                 | Returns the name, parents, properties and methods for the class of the passed object. |
| `getDefined(bool $categorizeConstants = false, bool $excludeDisabled = true): array` | Returns the declared classes, interfaces, traits, constants, functions and variables. |

## Mysql

| Functions                                   | Description                                                                                        |
| ------------------------------------------- | -------------------------------------------------------------------------------------------------- |
| `executeQuery(\mysqli $mysqli, string $sql, ?array $params = null): ?\mysqli_stmt` | Prepares an SQL statement, binds parameters, executes, and returns the result. |

## Random Generator

| Functions                                | Description                                        |
| ---------------------------------------- | -------------------------------------------------- |
| `number(int $length): int`               | Generates a random integer number (max length: 18) |
| `largeNumber(int $length): string`       | Generates a random number as string.               |
| `hexadecimalNumber(int $length): string` | Generates a random hexadecimal number.             |
| `uuidV4(): string`                       | Generates a random uuid version 4.                 |
| `password(int $length = 12, bool $useUppercase = true, bool $useLowercase = true, bool $useNumbers = true, bool $useSpecialChars = false): string` | Generates a random password. |
