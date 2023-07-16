<?php

interface SalaryStrategyInterface
{
    public function calc($period, $user) : int;
    public function getName() : string;
}