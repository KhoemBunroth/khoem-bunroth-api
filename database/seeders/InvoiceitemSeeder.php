<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('invoice_item')->truncate(); // Clear existing data
        DB::table('invoice_item')->insert([
            [
                'invoice_id' => 1,
                'product_id' => 1,
                'qty' => 2,
                'price' => 75.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 2,
                'product_id' => 2,
                'qty' => 1,
                'price' => 200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 3,
                'product_id' => 3,
                'qty' => 3,
                'price' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 1,
                'product_id' => 4,
                'qty' => 1,
                'price' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
