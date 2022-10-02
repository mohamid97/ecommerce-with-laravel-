<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for($i = 1 ; $i<=5 ;$i ++){
            Product::create([
                'en'=>[
                       'name'=>"test_name_english" . $i,
                       'des'=>"test_des_english" . $i,
                ],
                'ar'=>[
                       'name'=>"test_name_arabic" . $i,
                       'des'=>"test_des_arabic" . $i    
                      ],
                'category_id'=>1,
                'stockNumber'=>10,
                'purchasePrice'=>200*$i,
                'image'=>"default.jpg"
               
            ]);
         }
    }
}
