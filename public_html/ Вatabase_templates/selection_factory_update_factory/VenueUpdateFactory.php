<?php

class VenueUpdateFactory extends UpdateFactory
{
    public function newUpdate(DomainObject $obj): array
    {
        // Обратите внимание на удаленную проверку типа
        $id = $obj->getId();
        $cond = null;
        $values['name'] = $obj->getName();
        if ($id > 0)
        {
            $cond['id'] = $id;
        }
        return $this->buildStatement("venue", $values, $cond);
    }
}