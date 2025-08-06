<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branch')->truncate(); // Clear existing data
        DB::table('branch')->insert([
            [
                'name' => 'Main Branch',
                'location' => '123 Main St, Cityville',
                'contact_number' => '123-456-7890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Secondary Branch',
                'location' => '456 Secondary St, Townsville',
                'contact_number' => '987-654-3210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
