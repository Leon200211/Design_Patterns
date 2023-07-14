<?php



interface EventChannelInterface
{

    public function publish(string $topic, string $data = '');
    public function subscribe(string $topic, SubscriberInterface $subcriber);

}