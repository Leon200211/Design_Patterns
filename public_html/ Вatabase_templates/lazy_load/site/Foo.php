<?php

class Foo
{
    /** @var mixed Reference property */
    private $bar = null;

    /**
     * Get reference and assign it via some resource expensive method call only
     * once.
     *
     * @return mixed
     */
    public function getBar()
    {
        if ($this->bar == null) {
            $this->bar = $this->expensiveCall();
        }

        return $this->bar;
    }

    /**
     * This method makes something resource intense and calling it multiple
     * times inside a single request can be avoided with above lazy loading.
     */
    private function expensiveCall()
    {
        // ...
    }
}