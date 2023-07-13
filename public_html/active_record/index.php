<?php

spl_autoload_register();

define('ROOT_DIR', __DIR__);
define('ENV', "active_record");




$test = new controllers\IndexController();
$test->index();


