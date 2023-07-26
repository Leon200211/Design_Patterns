<?php

class ObjectAssembler
{
    private array $components = [];

    public function __construct(string $conf)
    {
        $this->configure($conf);
    }

    private function configure(string $conf)
    {
        $data = simplexml_load_file($conf);

        foreach ($data->class as $class) {
            $args = [];
            $name = (string)$class['name'];
            $resolvedname = $name;

            foreach ($class->arg as $arg) {
                $argclass = (string)$arg['inst'];
                $args[(int)$arg['num']] = $argclass;
            }

            if(isset($class->instance)) {
                if(isset($class->instance[0]['inst'])) {
                    $resolvedname = (string)$class->instance[0]['inst'];
                }

                ksort($args);
                $this->components[$name] = function() use ($resolvedname, $args) {
                    $expandedargs = [];
                    foreach ($args as $arg) {
                        $expandedargs[] = $this->getComponent($arg);
                    }
                    $rclass = new \ReflectionClass($resolvedname);
                    return $rclass->newInstanceArgs($expandedargs);
                };
            }

        }

    }

    public function getComponent(string $class) : object
    {
        // Создание $inst - экземпляр нашего объукта
        // и список объектов \ReflectionMethod
        if (isset($this->components[$class])) {
            $inst = $this->components[$class]();
            $rclass = new \ReflectionClass($inst::class);
            $methods = $rclass->getMethods();
        } else {
            $rclass = new \ReflectionClass($class);
            $methods = $rclass->getMethods();
            $injectconstructor = null;
            foreach ($methods as $method) {
                foreach ($method->getAttributes(InjectConstructor::class) as $attribute) {
                    $injectconstructor = $attribute;
                    break;
                }
            }
            if(is_null($injectconstructor)) {
                $inst = $rclass->newInstance();
            } else {
                $constructorgs = [];
                foreach ($injectconstructor->getArguments() as $arg) {
                    $constructorgs[] = $this->getComponent($arg);
                }
                $inst = $rclass->newInstanceArgs($constructorgs);
            }
        }

        return $inst;
    }


}