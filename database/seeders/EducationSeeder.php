<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
            ['education_name' => 'Any Postgraduate', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['education_name' => 'Post Graduation Not Required', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['education_name' => 'M.Tech', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['education_name' => 'MCA', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['education_name' => 'MS/M.Sc(Science)', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['education_name' => 'MBA/PGDM', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['education_name' => 'B.Tech/B.E.', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['education_name' => 'Any Graduate', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['education_name' => 'BCA', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['education_name' => 'Diploma', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['education_name' => 'Graduation Not Required', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['education_name' => 'B.Com', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],

        ];

        foreach ($educations as $education) {
            Education::create($education);
        }
    }
}
