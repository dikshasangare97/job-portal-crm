<?php

namespace Database\Seeders;

use App\Models\ApplicationStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applicationStatuses = [
            ['application_status_name' => 'Applied', 'application_status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['application_status_name' => 'Application Sent', 'application_status' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['application_status_name' => 'Application Viewed', 'application_status' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['application_status_name' => 'Resume Viewed', 'application_status' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['application_status_name' => 'Shortlisted', 'application_status' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['application_status_name' => 'Contacted By Email', 'application_status' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['application_status_name' => 'Not Shortlisted', 'application_status' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['application_status_name' => 'Awaiting Recruiter Action', 'application_status' => 8, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($applicationStatuses as $status) {
            ApplicationStatus::create($status);
        }
    }
}
