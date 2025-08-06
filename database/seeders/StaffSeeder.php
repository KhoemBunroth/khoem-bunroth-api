<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->truncate(); // Clear existing data
        DB::table('staff')->insert([
            [
                'position_id' => 1,
                'name' => 'John Doe',
                'gender' => 'Male',
                'date_of_birth' => '1990-01-01',
                'place_of_birth' => 'Cityville',
                'address' => '789 Staff St, Cityville',
                'phone' => '123-456-7890',
                'nation_id_card' => 'ID123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_id' => 2,
                'name' => 'Jane Smith',
                'gender' => 'Female',
                'date_of_birth' => '1992-02-02',
                'place_of_birth' => 'Townsville',
                'address' => '321 Staff St, Townsville',
                'phone' => '987-654-3210',
                'nation_id_card' => 'ID987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_id' => 1,
                'name' => 'Alice Johnson',
                'gender' => 'Female',
                'date_of_birth' => '1995-03-03',
                'place_of_birth' => 'Villageville',
                'address' => '456 Staff St, Villageville',
                'phone' => '654-321-0987',
                'nation_id_card' => 'ID654321098',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
