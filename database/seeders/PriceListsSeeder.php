<?php

namespace Database\Seeders;

use App\Models\PriceList;
use Illuminate\Database\Seeder;

class PriceListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PriceList::insert([
            ['currency_code' => PriceList::INTERNATIONAL_CURRENCY_CODE],
            ['currency_code'=>PriceList::EUROPE_CURRENCY_CODE]
        ]);
    }
}
