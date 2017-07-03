<?php
namespace Training\Quotations;

class Quotation
{

    private $stock;

    private $value;

    private $date;

    public function __construct(string $stock, float $value, \DateTimeInterface $date)
    {
        $this->stock = $stock;
        $this->value = $value;
        $this->date = $date;
    }

    public static function read(string $detailedString): self
    {
        $split = explode(',', $detailedString);
        return new Quotation($split[0], floatval($split[1]), \DateTime::createFromFormat('YmdHis', $split[2]));
    }

    public function getStock(): string
    {
        return $this->stock;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function toSimpleString(): string
    {
        return $this->stock . "," . $this->value;
    }

    public function toString(): string
    {
        return $this->stock . "," . $this->value . "," . $this->date->format('YmdHis');
    }

}
