<?php

namespace Database\Seeders;

use App\Models\Workmode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkmodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workmode = [
            ['work_mode_name' => 'Work from office', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['work_mode_name' => 'Remote', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['work_mode_name' => 'Hybrid', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['work_mode_name' => 'Temp. WFH', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['work_mode_name' => 'Perm. WFO', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
           
            ];

        foreach ($workmode as $workmode) {
            Workmode::create($workmode);
        }
    }
}
