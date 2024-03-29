<?php

class Controller
{
    private function __construct()
    {
        $this->reg = Registry::instance();
    }

    private function handleRequest(): void
    {
        $request = $this->reg->getRequest();
        $controller = new AppController();
        $cmd = $controller->getCommand($request);
        $cmd->execute($request);
        $view = $controller->getView($request);
        $view->render($request);
    }

    public static function run(): void
    {
        $instance = new self();
        $instance->init();
        $instance->handleRequest();
    }

    private function init(): void
    {
        $this->reg->getApplicationHelper()->init();
    }

}