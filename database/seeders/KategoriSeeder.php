<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'slug'      => Str::slug('Elektronik'),
                'category'  => 'Elektronik',
            ],
            [
                'slug'      => Str::slug('Fasion Pria'),
                'category'  => 'Fasion Pria',
            ],
            [
                'slug'      => Str::slug('Fasion Wanita'),
                'category'  => 'Fasion Wanita',
            ],
            [
                'slug'      => Str::slug('Kecantikan'),
                'category'  => 'Kecantikan',
            ],
        ];

        foreach ($data as $record) {
            Kategori::create($record);
        }
    }
}
