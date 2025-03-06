<?php

namespace App\Models;

use App\Interfaces\Product;

class Cow extends Animal
{
    protected const MIN_QUANTITY_PRODUCTION = 8;

    protected const MAX_QUANTITY_PRODUCTION = 12;

    public function getName(): string
    {
        return 'cow';
    }

    protected function getProductsQuantity(): int
    {
        return rand(self::MIN_QUANTITY_PRODUCTION, self::MAX_QUANTITY_PRODUCTION);
    }

    public function produceProduct(): Product
    {
        return new MilkLiter();
    }
}
