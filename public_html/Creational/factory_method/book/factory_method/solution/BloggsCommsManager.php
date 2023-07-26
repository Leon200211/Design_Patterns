<?php


class BloggsCommsManager extends CommsManager
{
    public function getheaderText(): string
    {
        // TODO: Implement getheaderText() method.
        return "1";
    }
    public function getApptEncoder(): ApptEncoder
    {
        // TODO: Implement getApptEncoder() method.
        return new BloggsApptEncoder();
    }
    public function getFooterText(): string
    {
        // TODO: Implement getFooterText() method.
        return "2";
    }
}