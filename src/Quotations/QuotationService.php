<?php

namespace Training\Quotations;

class QuotationService
{
    private $current = 80.63;
    private $symbol = "PVTL";

    public function next(): string
    {
        return $this->nextDetailed()->toSimpleString();
    }

    private function nextDetailed()
    {
        $this->current += $this->random() - 0.4;
        $quotation = new Quotation($this->symbol, $this->current, new \DateTime());

        return $quotation;
    }

    private function random()
    {
        return (float)rand() / (float)getrandmax();

    }
}