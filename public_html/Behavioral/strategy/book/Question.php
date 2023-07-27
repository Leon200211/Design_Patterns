<?php

abstract class Question
{
    public function __construct(protected string $prompt,
                                protected Marker $marker)
    {
    }

    public function mark(string $response): bool
    {
        return $this->marker->mark($response);
    }

}