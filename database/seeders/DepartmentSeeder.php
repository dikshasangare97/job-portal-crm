<?php

namespace Database\Seeders;

use App\Models\Departments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = [
            ['department_name' => 'Engineering - Software & QA', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'IT & Information Security', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Data Science & Analytics', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Project Management', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Consultancy', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Sales & Business Development', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Human Resources', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Quality Assurance', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'UX Design', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Hardware & Network', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            
            ];

        foreach ($department as $department) {
            Departments::create($department);
        }

    }
}
