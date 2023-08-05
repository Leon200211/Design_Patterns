<?php

class HttpRequest extends Request
{
    public function init(): void
    {
        // Ради удобства здесь игнорируются различия
        // в методах запросов POST, GET и так далее, но
        // этого нельзя делать в реальном проекте!
        $this->properties = $_REQUEST;
        $this->path = $_SERVER['PATH_INFO'];
        $this->path = (empty($this->path)) ? "/" : $this->path;
    }
}