<?php



abstract class CommsManager
{
    abstract public function getheaderText(): string;
    abstract public function getApptEncoder(): ApptEncoder;
    abstract public function getFooterText(): string;
}