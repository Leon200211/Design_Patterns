<?php

abstract class Component
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public abstract function display();
}

class Composite extends Component
{
    private $children = array();

    public function add(Component $component)
    {
        $this->children[$component->name] = $component;
    }

    public function remove(Component $component)
    {
        unset($this->children[$component->name]);
    }

    public function display()
    {
        foreach($this->children as $child) {
            $child->display();
        }
    }
}

class Leaf extends Component
{
    public function display()
    {
        print_r($this->name);
    }
}

// Create a tree structure
$root = new Composite("root");

$root->add(new Leaf("Leaf A"));
$root->add(new Leaf("Leaf B"));

$comp = new Composite("Composite X");

$comp->add(new Leaf("Leaf XA"));
$comp->add(new Leaf("Leaf XB"));
$root->add($comp);
$root->add(new Leaf("Leaf C"));

// Add and remove a leaf
$leaf = new Leaf("Leaf D");
$root->add($leaf);
$root->remove($leaf);

// Recursively display tree
$root->display();
?>