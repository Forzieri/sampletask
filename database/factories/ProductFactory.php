<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $variants = $this->getVariantTypes();
        return [
            'name'=>Str::random(12),
            'description'=>$this->faker->text(100),
            'category'=>$this->faker->category(),
            'brand'=>$this->faker->department,
            'variant_type'=>$variants[rand(0,count($variants)-1)]
        ];
    }

    protected function getVariantTypes(){
        return ['size','color','simple'];
    }

}
