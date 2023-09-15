<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['city_name' => 'Bangalore/Bengaluru', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['city_name' => 'Delhi / NCR', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['city_name' => 'Hyderabad/Secunderabad', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['city_name' => 'Pune', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['city_name' => 'Chennai', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['city_name' => 'Mumbai', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['city_name' => 'New Delhi', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['city_name' => 'Indore', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['city_name' => 'Surat', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['city_name' => 'Navi Mumbai', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
