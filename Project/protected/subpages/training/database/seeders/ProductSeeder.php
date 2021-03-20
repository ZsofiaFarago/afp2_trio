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

        DB::table('products')->insert([
            'name' => '100 Pure Whey 1 kg',
            'price' => '7990',
            'description' => "Gluténmentes tejsavó-fehérje komplex, hozzáadott extra aminosavakkal, édesítőszerekkel.",
            'category' => 'feherje',
            'gallery' => 'https://shopbuilder.hu/images/product_images/13899_f1e71366642f.png'
        ]);

        DB::table('products')->insert([
            'name' => 'Mega Daily One Plus',
            'price' => '4490',
            'description' => "A Mega Daily One Plus a mi fejlett multivitamin és ásványi anyag formulánk, 25 hatóanyaggal! Magas dózisban tartalmaz B-vitamin komplex-t és a C-vitamint, valamint létfontosságú ásványi anyagokat, köztük magnéziumot, szelént és cinket.",
            'category' => 'multivitamin',
            'gallery' => 'https://shopbuilder.hu/images/product_images/8265_d0adcc1f641e.png'
        ]);

        DB::table('products')->insert([
            'name' => 'MCreatine Monohydrate 500 gr',
            'price' => '3190',
            'description' => "A kreatin egy olyan nitrogén tartalmú szerves sav, amely növeli a fizikai teljesítményt rövid, sorozatos, nagy intenzitású testmozgás során.",
            'category' => 'kreatin',
            'gallery' => 'https://shopbuilder.hu/images/product_images/13916_acaaca82c139.png'
        ]);

        DB::table('products')->insert([
            'name' => 'Micronized Creatine Powder 634 gr',
            'price' => '8690',
            'description' => "Az Optimum Nutrition Creatine Powder színtiszta kreatin-monohidrát rendkívül tiszta formában.",
            'category' => 'kreatin',
            'gallery' => 'https://shopbuilder.hu/images/product_images/3686_b6efc0cff2d9.png'
        ]);

        DB::table('products')->insert([
            'name' => 'Superhero 285 gr',
            'price' => '8490',
            'description' => "Étrendkiegészítő por aminosavakkal, béta-alaninnal, l-citrullinnal, növényi kivonatokkal, C-vitaminnal és édesítőszerekkel",
            'category' => 'preworkout',
            'gallery' => 'https://shopbuilder.hu/images/product_images/13081_b96dad996564.png'
        ]);

        DB::table('products')->insert([
            'name' => 'Nitrox Therapy 340 gr',
            'price' => '4690',
            'description' => "FELÜLMÚLHATATLAN EDZÉS ELŐTTI FORMULA NITROGÉN-MONOXIDOKKAL (CITRULLIN ÉS ARGININ), KREATINOKKAL, BCAA-KKAL ÉS KOMPLEX SZÉNHIDRÁTOKKAL KIEGÉSZÍTVE. FANTASZTIKUS ÍZ. DOPPINGMENTES.",
            'category' => 'preworkout',
            'gallery' => 'https://shopbuilder.hu/images/product_images/10616_bf83d67f2f3d.png'
        ]);
    }
}
