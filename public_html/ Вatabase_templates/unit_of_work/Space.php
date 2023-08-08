<?php

class Space
{
    public function setVenue(Venue $venue): void
    {
        $this->venue = $venue;
        $this->markDirty();
    }
    public function setName(string $name): void
    {
        $this->name = $name;
        $this->markDirty();
    }
}