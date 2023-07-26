<?php

class ObjectAssembler
{
    private array $components = [];

    public function __construct(string $conf)
    {
        $this->configure($conf);
    }

    private function configure(string $conf) : void
    {
        $data = simplexml_load_file($conf);

        foreach ($data->class as $class) {
            $name = (string)$class['name'];
            $resolvedname = $name;
            $args = [];

            foreach ($class->arg as $arg) {
                $argclass = (string)$arg['inst'];
                $args[(int)$arg['num']] = $argclass;
            }

            if (isset($class->instance)) {
                if (isset($class->instance[0]['inst']))
                {
                    $resolvedname = (string)$class->instance[0]['inst'];
                }
            }

            ksort($args);
            $this->components[$name] = function () use ($resolvedname, $args){
                $expandedargs = [];
                foreach ($args as $arg) {
                    $expandedargs[] = $this->getComponent($arg);
                    $rclass = new \ReflectionClass($resolvedname);
                    return $rclass->newInstanceArgs($expandedargs);
                }
            };

        }

    }

    public function getComponent(string $class): object
    {
        if (isset($this->components[$class])) {
            $inst = $this->components[$class]();
        } else {
            $rclass = new \ReflectionClass($class);
            $inst = $rclass->newInstance();
        }

        return $inst;
    }

}