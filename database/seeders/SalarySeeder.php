<?php

namespace Database\Seeders;

use App\Models\Salary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salaries = [
            ['salary_to' => '0', 'salary_from' => '300000', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['salary_to' => '300000', 'salary_from' => '600000', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['salary_to' => '600000', 'salary_from' => '1000000', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['salary_to' => '1000000', 'salary_from' => '1500000', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['salary_to' => '1500000', 'salary_from' => '2500000', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['salary_to' => '2500000', 'salary_from' => '5000000', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['salary_to' => '5000000', 'salary_from' => '7500000', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['salary_to' => '7500000', 'salary_from' => '10000000', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['salary_to' => '10000000', 'salary_from' => '50000000', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['salary_to' => '50000000', 'salary_from' => '100000000', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($salaries as $salary) {
            Salary::create($salary);
        }
    }
}
