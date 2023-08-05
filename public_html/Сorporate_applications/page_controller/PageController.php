<?php

abstract class PageController
{
    private Registry $reg;
    abstract public function process(): void;

    public function __construct()
    {
        $this->reg = Registry::instance();
    }

    public function init(): void
    {
        if (isset($_SERVER['REQUEST METHOD'])) {
            $request = new HttpRequest();
        } else {
            $request = new CliRequest();
        }
        $this->reg->setRequest($request);
    }

    public function forward(string $resource): void
    {
        $request = $this->getRequest();
        $request->forward($resource);
    }

    public function render(string $resource, Request $request): void
    {
        include($resource);
    }

    public function getRequest(): Request
    {
        return $this->reg->getRequest();
    }
}