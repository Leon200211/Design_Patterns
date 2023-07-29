<?php

abstract class CompositeUnit extends Unit
{
    public function addUnit(Unit $unit): void
    {
        foreach ($this->units as $thisunit)
        {
            if ($unit === $thisunit)
            {
                return;
            }
        }
        $unit->setDepth($this->depth + 1);
        $this->units[] = $unit;
    }
    public function accept(ArmyVisitor $visitor): void
    {
        parent::accept($visitor);
        foreach ($this->units as $thisunit)
        {
            $thisunit->accept($visitor);
        }
    }

}