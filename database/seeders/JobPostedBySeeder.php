<?php

namespace Database\Seeders;

use App\Models\JobPostedBy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobPostedBySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postedBies = [
            ['posted_by_name' => 'Company Jobs', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['posted_by_name' => 'Consultant Jobs', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($postedBies as $postedBy) {
            JobPostedBy::create($postedBy);
        }
    }
}
