<?php

class MarkLogicMarker extends Marker
{
    private MarkParse $engine;
    public function construct(string $test)
    {
        parent:: __construct($test);
        $this->engine = new MarkParse($test);
    }
    public function mark(string $response): bool
    {
        return $this->engine->evaluate($response);
    }
}