<?php

namespace Database\Seeders;

use App\Models\CompanyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyTypes = [
            ['company_type_name' => 'Corporate', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['company_type_name' => 'Foreign MNC', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['company_type_name' => 'Indian MNC', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['company_type_name' => 'Startup', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['company_type_name' => 'Others', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['company_type_name' => 'Govt/PSU', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['company_type_name' => 'MNC', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($companyTypes as $companyType) {
            CompanyType::create($companyType);
        }
    }
}
