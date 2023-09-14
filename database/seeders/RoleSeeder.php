<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['role_name' => 'Software Development', 'description' => fake()->text(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'DevOps', 'description' => fake()->text(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'Quality Assurance and Testing', 'description' => fake()->text(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'Data Science & Machine Learning', 'description' => fake()->text(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'Other', 'description' => fake()->text(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'DBA / Data warehousing', 'description' => fake()->text(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'IT Support', 'description' => fake()->text(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'Technology / IT', 'description' => fake()->text(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'UI / UX', 'description' => fake()->text(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'Engineering', 'description' => fake()->text(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'Marketing', 'description' => fake()->text(), 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
