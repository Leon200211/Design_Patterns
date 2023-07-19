<?php

interface BlogPostBuilderInterface
{
    public function create() : BlogPostBuilderInterface;
    public function setTitle(string $val) : BlogPostBuilderInterface;
    public function setBody(string $val) : BlogPostBuilderInterface;
    public function setCategories(array $val) : BlogPostBuilderInterface;
    public function setTags(array $val) : BlogPostBuilderInterface;
    public function getBlogPost() : BlogPost;
}