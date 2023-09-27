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

        // for admin
        $admin = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'admin@dwebpixel.com',
            'password' => Hash::make('Password1!'), // '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password,
            'register_for' => 'admin',
            'is_active' => '1',
            'is_user' => '2'

        ]);

        // for user 
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'user@dwebpixel.com',
            'password' => Hash::make('Password1!'), // '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password,
            'register_for' => 'user',
            'is_active' => '1',
            'is_user' => '1'
        ]);

        // for recuiter
        $recruiter = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'recruiter@dwebpixel.com',
            'password' => Hash::make('Password1!'), // '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password,
            'register_for' => 'company',
            'is_active' => '1',
            'is_user' => '0'
        ]);

        tap(new EducationSeeder(), function ($seeder) {
            $seeder->run();
        });

        tap(new CompanyTypeSeeder(), function ($seeder) {
            $seeder->run();
        });

        tap(new IndustrySeeder(), function ($seeder) {
            $seeder->run();
        });

        tap(new LocationSeeder(), function ($seeder) {
            $seeder->run();
        });

        tap(new RoleSeeder(), function ($seeder) {
            $seeder->run();
        });
        tap(new JobPostedBySeeder(), function ($seeder) {
            $seeder->run();
        });

        tap(new DepartmentSeeder(), function ($seeder) {
            $seeder->run();
        });

        tap(new WorkmodeSeeder(), function ($seeder) {
            $seeder->run();
        });

        tap(new ExperienceSeeder(), function ($seeder) {
            $seeder->run();
        });

        tap(new JobRoleSeeder(), function ($seeder) {
            $seeder->run();
        });

        tap(new KeySkillSeeder(), function ($seeder) {
            $seeder->run();
        });

        tap(new JobSeeder(), function ($seeder) {
            $seeder->run();
        });
    }
}
