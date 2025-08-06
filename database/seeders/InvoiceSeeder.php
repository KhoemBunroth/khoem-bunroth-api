<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('invoice')->truncate(); // Clear existing data
        DB::table('invoice')->insert([
            [
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'total' => 150.00
            ],
            [
                'user_id' => 2,
                'create_at' => now(),
                'updated_at' => now(),
                'total' => 200.00
            ],
            [
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'total' => 300.00
            ]
        ]);
    }   
}
