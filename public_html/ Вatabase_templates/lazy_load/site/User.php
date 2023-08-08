<?php

class User
{
    /** @var array Post items */
    private $posts;

    /** @var Closure Reference to a user repository */
    private $reference;

    /**
     * Set reference to a user repository method with Closure.
     *
     * @param Closure
     */
    public function setReference(Closure $reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get array of items retrieved from the database with the method call of
     * the repository. The retrieval from the database happens only once with
     * the help of lazy loading and therefore improves performance.
     *
     * @return array
     */
    public function getPosts()
    {
        if (!isset($this->posts)) {
            $reference = $this->reference;
            $this->posts = $reference();
        }

        return $this->posts;
    }
}