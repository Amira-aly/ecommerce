<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();

        Category::create([
            'name' => 'Electric Machines'
        ]);
        Category::create([
            'name' => 'pants'
        ]);
        Category::create([
            'name' => 'shoes'
        ]);
        Category::create([
            'name' => 'Telephones'
        ]);
        Category::create([
            'name' => 'laptops'
        ]);
        Category::create([
            'name' => 'T-shirts'
        ]);
    }
}
