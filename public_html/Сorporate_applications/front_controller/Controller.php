<?php

class Controller
{
    private Registry $reg;
    private function construct()
    {
        $this->reg = Registry::instance();
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
    private function handleRequest(): void
    {
        $request = $this->reg->getRequest();
        $resolver = new CommandResolver();
        $cmd = $resolver->getCommand($request);
        $cmd->execute($request);
    }
}