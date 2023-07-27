<?php

/**
 * В PHP осуществляется встроенная поддержка этого шаблона через входящее в поставку
 * расширение SPL (Standard PHP Library):
 * SplObserver - интерфейс для Observer (наблюдателя),
 * SplSubject - интерфейс Observable (наблюдаемого),
 * SplObjectStorage - вспомогательный класс (обеспечивает улучшенное сохранение и удаление
 * объектов, в частности, реализованы методы attach() и detach()).
 */
class Observable implements SplSubject
{
    private $storage;

    function __construct()
    {
        $this->storage = new SplObjectStorage();
    }

    function attach(SplObserver $observer)
    {
        $this->storage->attach($observer);
    }

    function detach(SplObserver $observer)
    {
        $this->storage->detach($observer);
    }

    function notify()
    {
        foreach($this->storage as $obj)
        {
            $obj->update($this);
        }
    }
}

class ConcreteObserver implements SplObserver
{
    private $observable;
    private $index;

    function __construct(Observable $observable)
    {
        static $sindex=0;

        $this->index=$sindex++;

        $this->observable = $observable;
        $observable->attach($this);
    }

    function update(SplSubject $subject)
    {
        if($subject === $this->observable)
        {
            echo "Send notify to ConcreteObserver [$this->index]\n";
        }
    }

}

$observable = new Observable();

new ConcreteObserver($observable);
new ConcreteObserver($observable);
new ConcreteObserver($observable);

$observable->notify();