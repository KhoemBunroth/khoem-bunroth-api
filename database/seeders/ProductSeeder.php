<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->truncate(); // Clear existing data
        DB::table('product')->insert([
            [
                'name' => 'Smartphone',
                'category_id' => 1,
                'cost' => 499.99,
                'price' => 699.99,
                'description' => 'Latest model with advanced features.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Office Chair',
                'category_id' => 2,
                'cost' => 99.99,
                'price' => 149.99,
                'description' => 'Ergonomic chair for comfort during work.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Winter Jacket',
                'category_id' => 3,
                'cost' => 59.99,
                'price' => 89.99,
                'description' => 'Warm and stylish jacket for cold weather.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Programming Book',
                'category_id' => 4,
                'cost' => 19.99,
                'price' => 29.99,
                'description' => 'Comprehensive guide to modern programming languages.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
