<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'super_admin@dwebpixel.com',
            'password' => Hash::make('Password1!'), // '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password,
            'register_for' => 'super_admin',
            'is_active' => '1',
            'is_user' => '2'

        ]);

        tap(new JobSeeder(), function ($seeder) {
            $seeder->run();
        });

        tap(new EducationSeeder(), function ($seeder) {
            $seeder->run();
        });
    }
}
