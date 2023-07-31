<?php

class Registry
{
    private static ? Registry $instance = null;
    private array $values = [];
    private ? Request $request = null;

    private function construct()
    {
    }
    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get(string $key): mixed
    {
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }
        return null;
    }

    public function set(string $key, mixed $value): void
    {
        $this->values[$key] = $value;
    }
}