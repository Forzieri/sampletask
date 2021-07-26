<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use App\Models\Variant;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Product::factory()->count(5)->create()->each(function ($product){
            $variationValue = $this->getVariations($product->variant_type);
            $variationCounts = $product->variantType === Product::SIMPLE_TYPE ? 1 : mt_rand(1,3);
            Variant::factory(['product_id'=>$product->id,'variation_value'=>$variationValue])->count($variationCounts)->create()->each(function ($variant){
                Price::factory(['variant_id'=>$variant->id,'price_list_id'=>1])->count(1)->create();
                Price::factory(['variant_id'=>$variant->id,'price_list_id'=>2])->count(1)->create();
            });
        });
    }

    private function getVariations($type){
        $faker = Factory::create();
        switch ($type){
            case 'color':{
                return $faker->colorName();
            }
            case 'size':{
                $sizes = $this->getSizes();
                return $sizes[rand(0,count($sizes) -1 )];
            }
            default:
                return $faker->word();
        }

    }

    private function getSizes(){
        return ['s','m','l'];
    }

}
