<?php

use App\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->delete();

        Country::create([
            'name' => 'UK',
            'price' => '3',
            'weight' => '100'
        ]);
        Country::create([
            'name' => 'US',
            'price' => '2',
            'weight' => '100'
        ]);
        Country::create([
            'name' => 'CN',
            'price' => '2',
            'weight' => '100'
        ]);
    }
}
