<?php

class Command
{
    final public function construct()
    {

    }

    public function execute(Request $request): void
    {
        $this->doExecute($request);
    }

    abstract protected function doExecute(Request $request): void;
}