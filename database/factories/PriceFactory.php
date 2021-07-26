<?php

namespace Database\Factories;

use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Price::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listPrice = mt_rand(100,100000);
        $salePrice = mt_rand(50,$listPrice);
        $saleDays = mt_rand(3,90);
        $startRangeDays = mt_rand(1,20);
        $saleStart = Carbon::now()->subDays($startRangeDays);
        $saleEnd = $saleStart->copy()->addDays($saleDays);
        return [
            'list_price'=>$listPrice,
            'sale_price'=>$salePrice,
            'sale_start'=>$saleStart,
            'sale_end'=>$saleEnd
        ];
    }
}
