<?php

namespace Database\Seeders;

use App\Models\JobFreshness;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobFreshnessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $freshnesses = [
            ['last_day_number' => '1', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['last_day_number' => '3', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['last_day_number' => '7', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['last_day_number' => '15', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['last_day_number' => '30', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($freshnesses as $freshness) {
            JobFreshness::create($freshness);
        }
    }
}
