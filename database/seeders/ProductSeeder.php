<?php

namespace Database\Seeders;

use App\Models\Pruduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desc = "Jam tangan SKMEI 1389 hadir dengan desain yang keren dengan dial digital dan analog, serta tiga buah chronograph digital yang masing-masing mempunyai fungsi sendiri. Desain strap serta bodi stainless steel membuat jam tangan ini sangat kokoh dan keren untuk dikenakan sehari-hari ataupun pada acara-acara tertentu.";
        
        $data = [
            [
                'category_id'       => 2,
                'product_name'      => "Jam Tangan Pria Jago",
                'price'             => 2000000,
                'qty'               => 10,
                'description'       => $desc,
            ],
            [
                'category_id'       => 3,
                'product_name'      => "Jam Tangan Wanita Single",
                'price'             => 2000000,
                'qty'               => 9,
                'description'       => $desc,
            ],
            [
                'category_id'       => 3,
                'product_name'      => "Baju Gamis",
                'price'             => 1000000,
                'qty'               => 9,
                'description'       => $desc,
            ],
            [
                'category_id'       => 4,
                'product_name'      => "Baju pendek sedikit panjang",
                'price'             => 20000,
                'qty'               => 100,
                'description'       => $desc,
            ],
            [
                'category_id'       => 1,
                'product_name'      => "HP Android Kece",
                'price'             => 2000000,
                'qty'               => 8,
                'description'       => $desc,
            ],
        ];

        foreach ($data as $record) {
            Pruduct::create($record);
        }
    }
}
