<?php

namespace App\Models;

use App\Interfaces\Product;

class Egg implements Product
{
    public function getName(): string
    {
        return 'eggs';
    }
}
