<?php


class EventChannelJob
{

    public function run()
    {
        $newsChannel = new EventChannel();

        $highgardenGroup = new Publisher('highgarden-news', $newsChannel);
        $winterfellNews = new Publisher('winterfell-news', $newsChannel);
        $winterfellDaily = new Publisher('winterfell-news', $newsChannel);

        $sansa = new Subscriber('Sansa Stark');
        $arya = new Subscriber('Arya Stark');
        $cersei = new Subscriber('Cersei Lannister');
        $snow = new Subscriber('Jon Show');

        $newsChannel->subscribe('highgarden-news', $cersei);
        $newsChannel->subscribe('winterfell-news', $sansa);

        $newsChannel->subscribe('highgarden-news', $arya);
        $newsChannel->subscribe('winterfell-news', $arya);

        $newsChannel->subscribe('winterfell-news', $snow);

        $highgardenGroup->publish('New highgarden post');
        $winterfellNews->publish('New winterfell post');
        $winterfellDaily->publish('New alternative winterfell post');

    }

}