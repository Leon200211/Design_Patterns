<?php

interface IText
{
    public function show();
}

class TextHello implements IText
{
    protected $object;

    public function __construct(IText $text)
    {
        $this->object = $text;
    }

    public function show()
    {
        echo 'Hello';
        $this->object->show();
    }
}

class TextWorld implements IText
{
    protected $object;

    public function __construct(IText $text)
    {
        $this->object = $text;
    }

    public function show()
    {
        echo 'world';
        $this->object->show();
    }
}

class TextSpace implements IText
{
    protected $object;

    public function __construct(IText $text)
    {
        $this->object = $text;
    }

    public function show()
    {
        echo ' ';
        $this->object->show();
    }
}

class TextEmpty implements IText
{
    public function show()
    {

    }
}

$decorator = new TextHello(new TextSpace(new TextWorld(new TextEmpty())));
$decorator->show(); // Hello world
echo '<br />' . PHP_EOL;
$decorator = new TextWorld(new TextSpace(new TextHello(new TextEmpty())));
$decorator->show(); // world Hello