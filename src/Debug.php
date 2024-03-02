<?php

declare(strict_types=1);

namespace Bunesk\PhpHelper;

class Debug
{
    /**
     * Dumps the passed variables and dies afterwards.
     *
     * @param mixed ...$vars
     * @return void
     */
    public static function dd(...$vars): void
    {
        foreach ($vars as $var) {
            print_r($var);
        }

        die();
    }

    /**
     * Returns the name, parents, properties and methods for the class of the passed object.
     *
     * @param object $class
     * @return array
     */
    public static function getClassInfo(object $class): array
    {
        $className = \get_class($class);

        $parents = [];
        $currentClass = $className;
        while ($parent = \get_parent_class($currentClass) !== false) {
            $parents[] = $parent;
            $currentClass = $parent;
        }

        return [
            'name'         => $className,
            'parents'      => $parents,
            'defaultProps' => \get_class_vars($className),
            'props'        => \get_object_vars($class),
            'methods'      => \get_class_methods($class),
        ];
    }

    /**
     * Returns the declared classes, interfaces and traits and defined constants, functions and variables.
     *
     * @param boolean $categorizeConstants
     * @param boolean $excludeDisabled
     * @return array
     */
    public static function getDefined(bool $categorizeConstants = false, bool $excludeDisabled = true): array
    {
        return [
            'classes'    => \get_declared_classes(),
            'interfaces' => \get_declared_interfaces(),
            'traits'     => \get_declared_traits(),
            'constants'  => \get_defined_constants($categorizeConstants),
            'functions'  => \get_defined_functions($excludeDisabled),
            'variables'  => \get_defined_vars(),
        ];
    }
}
