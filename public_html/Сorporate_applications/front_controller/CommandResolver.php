<?php

class CommandResolver
{

    private static ? \ReflectionClass $refcmd = null;
    private static string $defaultcmd = DefaultCommand::class;

    public function __construct()
    {
        // Этот объект можно сделать конфигурируемым
        self::$refcmd = new \ReflectionClass(Command::class);
    }

    public function getCommand(Request $request): Command
    {
        $reg = Registry::instance();
        $commands = $reg->getCommands();
        $path = $request->getPath();
        $class = $commands->get($path);
        if (is_null($class)) {
            $request->addFeedback("Путь '$path'не годится");
            return new self::$defaultcmd();
        }
        if (!class_exists($class)) {
            $request->addFeedback("Класс '$class' не найден");
            return new self::$defaultcmd();
        }
        $refclass = new \ReflectionClass($class);
        if (! $refclass->isSubClassOf(self::$refcmd))
        {
            $request->addFeedback("Команда '$refclass' не является Command");
            return new self::$defaultcmd();
        }
        return $refclass->newlnstance();
    }

}