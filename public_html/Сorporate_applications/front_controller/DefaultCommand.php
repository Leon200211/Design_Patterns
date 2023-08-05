<?php

class DefaultCommand extends Command
{
    protected function doExecute(Request $request): void
    {
        $request->addFeedback("Welcome to Woo");
        include(__DIR__ . "/main.php");
    }
}