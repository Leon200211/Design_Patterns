<?php

class TextDumpArmyVisitor extends ArmyVisitor
{
    public function visit(Unit $node): void
    {
        $txtout = $pad = 4 * $node->getDepth();
        $txtout .= sprintf("%{$pad}s", "");
        $txtout .= get_class($this) . ": ";
        $txtout .= "Огневая мощь: " . $this->bombardStrength() . "\n";

        $this->text  .= $txtout;
    }


    public function getText(): string
    {
        return $this->text;
    }

}