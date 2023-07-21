<?php

interface IComponent {
    function display();
}

trait TComponent
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function display()
    {
        print $this->name.'<br>'.PHP_EOL;
    }
}

trait TComposite
{
    use TComponent{
        TComponent::display as displaySelf;
    }

    protected $children = array();

    public function add(IComponent $item)
    {
        $this->children[$item->name] = $item;
    }

    public function remove(IComponent $item)
    {
        unset($this->children[$item->name]);
    }

    public function display()
    {
        $this->displaySelf();
        foreach ($this->children as $child) {
            $child->display();
        }
    }
}

class Composite implements IComponent
{
    use TComposite;
}

class Leaf implements IComponent
{
    use TComponent;
}

$root = new Composite("root");

$root->add(new Leaf("Leaf A"));
$root->add(new Leaf("Leaf B"));

$comp = new Composite("Composite X");

$comp->add(new Leaf("Leaf XA"));
$comp->add(new Leaf("Leaf XB"));
$root->add($comp);
$root->add(new Leaf("Leaf C"));

$leaf = new Leaf("Leaf D");
$root->add($leaf);
$root->remove($leaf);

$root->display();
