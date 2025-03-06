<?php

namespace App\Models;

use App\Interfaces\Product;

class MilkLiter implements Product
{
    public function getName(): string
    {
        return 'milk';
    }
}
