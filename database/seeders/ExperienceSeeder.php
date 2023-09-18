<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experience = [
            ['experience' => '1 Year', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['experience' => '2 Year', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['experience' => '3 Year', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['experience' => '4 Year', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['experience' => '5 Year', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['experience' => '6 Year', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

        ];

        foreach ($experience as $experience) {
            Experience::create($experience);
        } 
    }
}
