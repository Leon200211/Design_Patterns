<?php

class WidgetMiddleCategory extends WidgetAbstract
{
    public function run(Category $category)
    {
        $viewData = $this->getRealizationLogic($category);
        $this->viewLogic($viewData);
    }

    private function getRealizationLogic(Category $category)
    {
        $id = $category->id;
        $fullTitle = $category->id . ':::' . $category->name;
        $description = $category->description;

        return compact('id', 'fullTitle', 'description');
    }
}