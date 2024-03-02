<?php

declare(strict_types=1);

namespace Bunesk\PhpHelper;

class MySql
{
    /**
     * Prepares an SQL statement, binds parameters, executes, and returns the result.
     *
     * @param mysqli $mysql A mysqli object returned by mysqli_connect() or mysqli_init()
     * @param string $query  The query, as a string. It must consist of a single SQL statement.  The SQL statement may contain zero or more parameter markers represented by question mark (?) characters at the appropriate positions.
     * @param ?array $params An optional list array with as many elements as there are bound parameters in the SQL statement being executed. Each value is treated as a string.
     * @return mysqli_result|bool Results as a mysqli_result object, or false if the operation failed.
     */
    public static function executeQuery(\mysqli $mysqli, string $sql, ?array $params = null): ?\mysqli_stmt {
        $driver = new \mysqli_driver();
        $stmt = $mysqli->prepare($sql);

        if (!($driver->report_mode & MYSQLI_REPORT_STRICT) && $mysqli->error) {
            return null;
        }

        $stmt->execute($params);

        if (!($driver->report_mode & MYSQLI_REPORT_STRICT) && $stmt->error) {
            return null;
        }

        return $stmt->get_result();
    }
}
