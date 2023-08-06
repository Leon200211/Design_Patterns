<?php

class VenueManager extends Base
{
    private string $addvenue = "INSERT INTO venue (name)VALUES( ?)";
    private string $addspace = "INSERT INTO space (name, venue) VALUES( ?, ?)";
    private string $addevent = "INSERT INTO event (name, space, start, duration)VALUES( ?, ?, ?, ?)";

    public function addVenue(string $name, array $spaces): array
    {
        $pdo = $this->getPdo();
        $ret = [];
        $ret['venue'] = [$name];
        $stmt = $pdo->prepare($this->addvenue);
        $stmt->execute($ret['venue']);
        $vid = $pdo->lastInsertId();
        $ret['spaces'] = [];
        $stmt = $pdo->prepare($this->addspace);
        foreach ($spaces as $spacename)
        {
            $values = [$spacename, $vid];
            $stmt->execute($values);
            $sid = $pdo->lastInsertId();
            array_unshift($values, $sid);
            $ret['spaces'][] = $values;
        }
        return $ret;
    }

    public function bookEvent(int $spaceid, string $name, int $time, int $duration): void
    {
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare($this->addevent);
        $stmt->execute([$name, $spaceid, $time, $duration]);
    }

}