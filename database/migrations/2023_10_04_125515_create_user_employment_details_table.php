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
        Schema::create('user_employment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('current_employment')->default(0);
            $table->boolean('employment_type')->default(0);
            $table->string('total_experience_year')->nullable();
            $table->string('total_experience_month')->nullable();
            $table->string('company_name')->nullable();
            $table->string('designation_name')->nullable();
            $table->string('joining_date_year')->nullable();
            $table->string('joining_date_month')->nullable();
            $table->string('salary')->nullable();
            $table->json('skill_used')->nullable();
            $table->text('job_profile')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('worked_till_year')->nullable();
            $table->string('worked_till_month')->nullable();
            $table->integer('location')->nullable();
            $table->integer('department')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_employment_details');
    }
};
