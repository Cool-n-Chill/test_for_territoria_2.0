<?php

namespace App\Models;

use App\Interfaces\Product;

class Chicken extends Animal
{
    protected const MIN_QUANTITY_PRODUCTION = 0;

    protected const MAX_QUANTITY_PRODUCTION = 1;

    public function getName(): string
    {
        return 'chicken';
    }

    protected function getProductsQuantity(): int
    {
        return rand(self::MIN_QUANTITY_PRODUCTION, self::MAX_QUANTITY_PRODUCTION);
    }

    public function produceProduct(): Product
    {
        return new Egg();
    }
}
