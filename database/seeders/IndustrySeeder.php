<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            ['industry_name' => 'Recruitment / Staffing', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['industry_name' => 'IT Services & Consulting', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['industry_name' => 'Accounting / Auditing', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['industry_name' => 'Design', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['industry_name' => 'Software Product', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['industry_name' => 'Electronic Components / Semiconductors', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['industry_name' => 'BPO / Call Centre', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($industries as $industry) {
            Industry::create($industry);
        }
    }
}
