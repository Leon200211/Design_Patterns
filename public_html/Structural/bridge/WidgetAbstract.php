<?php

class WidgetAbstract
{

    protected $realization;

    public function setRealization(WidgetRealizationInterface $realization)
    {
        $this->realization = $realization;
    }

    public function getRealization()
    {
        return $this->realization;
    }

    protected function viewLogic($viewData)
    {
        $method = class_basename(static::class) . "::" . __FUNCTION__;
        echo $method;
    }
}