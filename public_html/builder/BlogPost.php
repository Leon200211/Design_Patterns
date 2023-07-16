<?php

class BlogPost
{

    public $title;
    public $body;
    public $tags = [];
    public $categories = [];


    /**
     * @param string $title
     * @param string $body
     * @param array $categories
     * @param array $tags
     */
    /*public function __construct(string $title, string $body, array $categories = [], array $tags = [])
    {
        $this->title = $title;
        $this->body = $body;
        $this->categories = $categories;
        $this->tags = $tags;
    }*/

}