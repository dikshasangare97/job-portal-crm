<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_keyskills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('post_jobs');
            $table->foreignId('key_skill_id')->constrained('key_skills');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_keyskills');
    }
};
