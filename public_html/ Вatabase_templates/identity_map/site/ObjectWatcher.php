<?php

class ObjectWatcher
{
    private array $all = [];
    private static  ? ObjectWatcher $instance = null;

    private function __construct()
    {
    }

    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new ObjectWatcher();
        }
        return self::$instance;
    }

    public function globalKey(DomainObject $obj): string
    {
        return get_class($obj) . '.' . $obj->getId();
    }

    public static function add(DomainObject $obj): void
    {
        $inst = self::instance();
        $inst->all[$inst->globalKey($obj)] = $obj;
    }

    public static function exist(string $classname, int $id): ? DomainObject
    {
        $inst = self::instance();
        $key = "{$classname} . {$id}";

        if (isset($inst->all[$key])) {
            return $inst->all[$key];
        }
        return null;
    }
}