<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VariantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Variant::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $quantityInStock = mt_rand(0,1000);
        return [
            'sku'=>Str::random(12),
            'gtin'=>mt_rand(10,100000000000),
            'quantity_in_stock'=>$quantityInStock,
            'status'=>$quantityInStock>0 ? 'available':'sold_out',
        ];
    }



}
