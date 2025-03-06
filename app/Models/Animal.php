<?php

namespace App\Models;

use App\Interfaces\Product;

abstract class Animal
{
    protected string $uid;

    public function __construct()
    {
        $this->uid = uniqid();
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function getDailyProductAmount(): array
    {
        return [$this->produceProduct()->getName(), $this->getProductsQuantity()];
    }

    abstract protected function getProductsQuantity(): int;

    abstract public function getName();

    abstract protected function produceProduct(): Product;
}
