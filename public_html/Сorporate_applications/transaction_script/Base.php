<?php

abstract class Base
{
    private \PDO $pdo;
    private string $config = __DIR__ . "/data/woo_options.ini";

    public function construct()
    {
        $reg = Registry::instance();
        $options = parse_ini_file($this->config, true);
        $conf = new Conf($options['config']);
        $reg->setConf($conf);
        $dsn = $reg->getDSN();
        if (is_null($dsn)) {
            throw new AppException("DSN не определен");
        }
        $this->pdo = new \PDO($dsn);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }

    public function getPdo(): \PDO
    {
        return $this->pdo;
    }
}