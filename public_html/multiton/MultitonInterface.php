<?php

interface MultitonInterface
{
    public static function getInstance(string $instanceName): self;
}