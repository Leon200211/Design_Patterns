<?php

class CommandContext
{
    private array $params = [];
    private string $error = "";

    public function construct()
    {
        $this->params = $_REQUEST;
    }

    public function addParam(string $key, $val): void
    {
        $this->params[$key] = $val;
    }

    public function get(string $key): string
    {
        if (isset($this->params[$key]))
        {
            return $this->params[$key];
        }
        return '';
    }

    public function setError($error): void
    {
        $this->error = $error;
    }
    public function getError(): string
    {
        return $this->error;
    }

}