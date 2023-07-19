<?php

require_once('PropertyContainer.php');

class BlogPost extends PropertyContainer
{

    private $title;

    public function setTitle($propertyName)
    {
        $this->title = $propertyName;
    }

}