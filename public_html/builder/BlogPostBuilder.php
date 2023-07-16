<?php

class BlogPostBuilder implements BlogPostBuilderInterface
{

    private $blogPost;

    public function __construct()
    {
        $this->create();
    }

    public function create() : BlogPostBuilderInterface
    {
        $this->blogPost = new BlogPost();

        return $this;
    }

    public function setTitle(string $val) : BlogPostBuilderInterface
    {
        $this->blogPost->title = $val;

        return $this;
    }

    public function setBody(string $val) : BlogPostBuilderInterface
    {
        $this->blogPost->body = $val;

        return $this;
    }

    public function setCategories(array $val): BlogPostBuilderInterface
    {
        // TODO: Implement setCategories() method.
        $this->blogPost->categories = $val;

        return $this;
    }

    public function setTags(array $val): BlogPostBuilderInterface
    {
        // TODO: Implement setTags() method.
        $this->blogPost->tags = $val;

        return $this;
    }

    public function getBlogPost(): BlogPost
    {
        // TODO: Implement getBlogPost() method.
        $result = $this->blogPost;
        $this->create();

        return $result;
    }

}