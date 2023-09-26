<?php

namespace Database\Seeders;

use App\Models\JobRole;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = Role::where('status', 1)->pluck('id')->toArray();

        $job_roles = [
            ['role_category_id' => 1, 'job_role_name' => 'Automation Architect', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Automation Developer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Back End Developer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Big Data Engineer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'CRM Architect', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Data Engineer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Data Platform Engineer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Embedded Systems Engineer ', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Engineering Manager', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'ERP Architect', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'ERP Developer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Front End Developer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Full Stack Developer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Game Developer / Programmer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Head - Engineering ', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Mobile / App Developer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Practice Manager / Head', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Search Engineer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Solution Architect', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Technical Architect', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Technical Lead', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Webmaster', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => 1, 'job_role_name' => 'Software Development - Other', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => 'DevOps Engineer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => 'DevOps Manager', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => 'Head - DevOps', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => 'Release Engineer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => 'Release Manager', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => 'Reliability Engineer', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => 'DevOps - Other', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => fake()->name(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => fake()->name(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => fake()->name(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => fake()->name(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => fake()->name(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => fake()->name(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => fake()->name(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => fake()->name(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => fake()->name(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_category_id' => $roles[array_rand($roles)], 'job_role_name' => fake()->name(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($job_roles as $job_role) {
            JobRole::create($job_role);
        }
    }
}
