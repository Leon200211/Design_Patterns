<?php

class VenueCollection extends Collection
{
    public function targetClass(): string
    {
        return Venue::class;
    }
}