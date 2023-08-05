<?php

class ApplicationHelper
{
    private string $config = __DIR__ . '/data/woo_option.ini';
    private Registry $reg;

    public function __construct()
    {
        $this->reg = Registry::instance();
    }

    public function init(): void
    {
        $this->setupOptions();
        if (defined('STDIN')) {
            $request = new CliRequest();
        } else {
            $request = new HttpRequest();
        }
        $this->reg->setRequest($request);

    }

    private function setupOptions(): void
    {
        if (!file_exists($this->config)) {
            throw new AppException("Файл не найден");
        }
        $options = parse_ini_file($this->config, true);
        $this->reg->setConf(new Conf($options['config']));
        $this->reg->setCommands(new Conf($options['commands']));
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        if (is_null($this->request)) {
            throw new \Exception("Request не установлен");
        }

        return $this->request;
    }

    public function getApplicationHelper(): ApplicationHelper
    {
        if (is_null($this->applicationHelper)) {
            $this->applicationHelper = new ApplicationHelper();
        }
        return $this->applicationHelper;
    }

    public function setConf(Conf $conf): void
    {
        $this->conf = $conf;
    }

    public function getConf(): Conf
    {
        if (is_null($this->conf)) {
            $this->conf = new Conf();
        }

        return $this->conf;
    }

    public function setCommands(Conf $commands): void
    {
        $this->commands = $commands;
    }

    public function getCommands(): Conf
    {
        if (is_null($this->commands)) {
            $this->commands = new Conf();
        }
        return $this->commands;
    }
}