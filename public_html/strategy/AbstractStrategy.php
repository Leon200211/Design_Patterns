<?php

abstract class AbstractStrategy implements SalaryStrategyInterface
{
    public function calc($period, $user): int
    {
        // TODO: Implement calc() method.
        return rand(500, 2000);
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
        return class_basename(static::class);
    }
}