<?php



class Subscriber implements SubscriberInterface
{

    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function notify($data) : void
    {
        // TODO: Implement notify() method.
        $msg = "{$this->getName()} оповещен данными [{$data}]";
        echo $msg . "<br>";
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
        return $this->name;
    }

}