<?php

class TaxCollectionVisitor extends ArmyVisitor
{
    private int $due = 0;
    private string $report = '';
    public function visit(Unit $node): void
    {
        $this->levy($node, 1);
    }
    public function visitArcher(Archer $node): void
    {
        $this->levy($node, 2);
    }
    public function visitCavalry(Cavalry $node): void
    {
        $this->levy($node, 3);
    }
    public function visitTroopCarrierUnit(TroopCarrierUnit $node): void
    {
        $this->levy($node, 5);
    }
    private function levy(Unit $unit, int $amount): void
    {
        $this->report .= "Налог для " . get_class($unit);
        $this->report .= ": $amount\n";
        $this->due += $amount;
    }
    public function getReport(): string
    {
        return $this->report;
    }
    public function getTax(): int
    {
        return $this->due;
    }

}