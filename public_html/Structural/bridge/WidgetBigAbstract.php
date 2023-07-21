<?php

class WidgetBigAbstract extends WidgetAbstract
{
    public function run(WidgetRealizationInterface $realization)
    {
        $this->setRealization($realization);

        $viewData = $this->getViewData();
        $this->viewLogic($viewData);
    }

    private function getViewData()
    {
        $id = $this->realization->getId();
        $fullTitle = $this->getRealization()->getFullTitle();
        $description = $this->getRealization()->getDescription();

        return compact('id', 'fullTitle', 'description');
    }
}