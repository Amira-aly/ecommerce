<?php

use App\Prodect;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdectSeeder extends Seeder
{
    public function run()
    {
        DB::table('prodects')->delete();

        Prodect::create([
            'name' => 'laptop gran',
            'description' => '7th generation, SST, 8GB RAM',
            'price' => '250',
            'category_id' => 5,
            'country_id' => 1,
            'selling_price' => 1,
            'weight' => 100,
            'image' => 'laptop.jpeg',
        ]);
        Prodect::create([
            'name' => 'T-shirt gran',
            'description' => 'Size 2X',
            'price' => '350',
            'category_id' => 6,
            'country_id' => 2,
            'selling_price' => 1,
            'weight' => 50,
            'image' => 't-shert.jpeg',
        ]);
    }
}
