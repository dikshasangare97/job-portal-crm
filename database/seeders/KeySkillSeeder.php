<?php

namespace Database\Seeders;

use App\Models\KeySkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeySkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $keySkills = [
            ['key_skill_name' => 'Html5', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'CSS', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'jQuery', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Javascript', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Core PHP', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Bootstrap', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'HTML', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Web Designing', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'JAVA', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'AI & Machine learning', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Blockchain', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Python', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Amazon Web Services', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Big Data', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Mobile technologies', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'React.js', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Angular', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Spring', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Node.js', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'SQL', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => '.Net', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Data analysis', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Graphic design', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Laravel', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Wordpress', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Codeigniter Framework', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Rest Api', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Accounting', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Phpmyadmin', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Dbms', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Phpunit', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'GIT', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Github', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Gitlab', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Grammar', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Drupal', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'CRM', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key_skill_name' => 'Jumla', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($keySkills as $keySkill) {
            KeySkill::create($keySkill);
        }
    }
}
