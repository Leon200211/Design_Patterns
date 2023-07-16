<?php

class BlogPostManager
{
    private $builder;

    public function setBuilder(BlogPostBuilderInterface $builder)
    {
        $this->builder = $builder;

        return $this;
    }

    public function createCleanPost()
    {
        $blogPost = $this->builder->getBlogPost();

        return $blogPost;
    }

    public function createNewPostIt()
    {
        $blogPost = $this->builder
            ->setTitle('Title')
            ->setBody('Body')
            ->setCategories(['Категория'])
            ->setTags(['tag', 'tag2'])
            ->getBlogPost();

        return $blogPost;
    }

    public function createNewPostCats()
    {
        $blogPost = $this->builder
            ->setTitle('Title2')
            ->setBody('Body2')
            ->setCategories(['Категория cats'])
            ->getBlogPost();

        return $blogPost;
    }

}