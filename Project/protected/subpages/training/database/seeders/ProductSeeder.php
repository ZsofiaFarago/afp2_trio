<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Whey Protein',
            'price' => '28990',
            'description' => "menosegi feherje",
            'category' => 'feherje',
            'gallery' => 'https://shopbuilder.hu/images/product_images/5147_54ddce4fd3b0.png'
        ]);
    }
}
