<?php


class EventChannel implements EventChannelInterface
{

    private $topics = [];

    public function subscribe(string $topic, SubscriberInterface $subsriber)
    {
        $this->topics[$topic][] = $subsriber;

        $msg = "{$subsriber->getName()} подписан на [{$topic}]";
        echo $msg . "<br>";
    }

    public function publish(string $topic, string $data = '')
    {
        // TODO: Implement publish() method.
        if (empty($this->topics[$topic])) {
            return;
        }

        foreach ($this->topics[$topic] as $subscriber) {
            $subscriber->notify($data);
        }
    }

}