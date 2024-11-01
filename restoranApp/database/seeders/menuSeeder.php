<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class menuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'name' => 'Nasi Goreng',
                'category' => 'makanan utama',
                'price' => 15000.00,
                'availability' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Es Teh Manis',
                'category' => 'minuman',
                'price' => 5000.00,
                'availability' => true,
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now(),
            ],
            [
                'name' => 'Pisang Goreng',
                'category' => 'makanan penutup',
                'price' => 10000.00,
                'availability' => false,
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now(),
            ],
        ]);
    }
}
