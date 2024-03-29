<?php

abstract class ArmyVisitor
{
    abstract public function visit(Unit $node);
    public function visitArcher(Archer $node): void
    {
        $this->visit($node);
    }
    public function visitCavalry(Cavalry $node): void
    {
        $this->visit($node);
    }
    public function visitLaserCanonUnit(LaserCanonUnit $node): void
    {
        $this->visit($node);
    }
    public function visitTroopCarrierUnit(TroopCarrierUnit $node):
    void
    {
        $this->visit($node);
    }
    public function visitArmy(Army $node): void
    {
        $this->visit($node);
    }
}