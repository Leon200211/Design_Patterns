<?php



interface SubscriberInterface
{
    public function notify($data) : void;
    public function getName() : string;
}