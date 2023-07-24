<?php

class DecoratorAppSettings
{
    public function run()
    {
        $settings = $this->getEnableSettings();
        $updateOrderObj = $this->createUpdater($settings);

        $order = new Order();
        $orderData = [];

        $updateOrderObj->run($order, $orderData);
    }

    private function getEnabledSettings() : \Cassandra\Collection
    {
        $settings = config('order-updaters.fromWeb');

        return collect($settings)->where('enabled', 1);
    }

    private function createUpdater(Collection $settings) : OrderUpdateInterface
    {
        $updateOrderObj = new OrderUpdate();

        $settings->each(
            function ($setting) use (&$updateOrderObj) {
                $className = $settings['decorator_class'];

                $updateOrderObj = (new $className($updateOrderObj));
            });
        return $updateOrderObj;
    }

}