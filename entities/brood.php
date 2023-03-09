<?php
//entities/Brood.php
declare(strict_types=1);

class Brood {
    private int $id;
    private string $name;
    private string $descr;
    private float $price;
    public function __construct(int $id, string $name, string $descr, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->descr = $descr;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescr(): string
    {
        return $this->descr;

    }
    public function getPrice(): float
    {
        return $this->price;

    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setDescr($descr)
    {
        $this->descr = $descr;
    }
    public function setPrice(float $price)
    {
        $this->price = $price;
    }
    
}