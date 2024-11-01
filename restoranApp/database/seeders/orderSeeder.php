<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class orderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for orders
        $orders = [
            [
                'customer_id' => 1, // Make sure this customer exists
                'menu_id' => 1, // Make sure this menu exists
                'quantity' => 2,
                'status' => 'sedang disiapkan',
                'order_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'customer_id' => 2,
                'menu_id' => 2,
                'quantity' => 1,
                'status' => 'siap diantar',
                'order_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'customer_id' => 3,
                'menu_id' => 3,
                'quantity' => 3,
                'status' => 'sudah selesai',
                'order_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more sample orders as needed
        ];

        // Insert sample data into the orders table
        DB::table('orders')->insert($orders);
    }
}
