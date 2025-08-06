<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('position')->truncate(); // Clear existing data
        DB::table('position')->insert([
            [
                'name' => 'Manager',
                'branch_id' => 1,
                'description' => 'Responsible for overseeing branch operations and staff.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Staff',
                'branch_id' => 2,
                'description' => 'Handles customer service and daily operations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
