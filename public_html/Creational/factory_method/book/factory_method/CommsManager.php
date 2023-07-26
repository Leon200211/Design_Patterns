<?php



class CommsManager
{
    public const BLOGGS = 1;
    public const MEGA = 2;

    public function __construct(private int $mode)
    {

    }

    public function getApptEncoder(): ApptEncoder
    {
        switch ($this->mode)
        {
            case (self::MEGA):
                return new MegaApptEncoder();
            default:
                return new BloggsApptEncoder();
        }

    }

    public function getHeaderText(): string
    {
        switch ($this->mode)
        {
            case (self::MEGA):
                return 'MegaCal header';
            default:
                return "BloggsCal header";
        }
    }

}