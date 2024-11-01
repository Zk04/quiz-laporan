<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'John Doe',
                'table_number' => 5,
                'contact' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'table_number' => 3,
                'contact' => '081987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'table_number' => 7,
                'contact' => '081223344556',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
