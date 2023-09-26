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
        Schema::create('user_personal_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('category')->nullable();
            $table->boolean('differently_abled')->default(0);
            $table->boolean('career_break')->default(0);
            $table->string('work_permit_usa')->nullable();
            $table->string('work_permit_country')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('hometown')->nullable();
            $table->string('pincode')->nullable();
            $table->integer('total_experience_year')->nullable();
            $table->integer('total_experience_month')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('current_location')->nullable();
            $table->string('current_location_name')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('resume')->nullable();
            $table->string('resume_headline')->nullable();
            $table->text('profile_summary')->nullable();
            $table->integer('industry_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('role_category_id')->nullable();
            $table->integer('job_role_id')->nullable();
            $table->string('desired_job_type')->nullable();
            $table->string('desired_employment_type')->nullable();
            $table->string('preferred_shift')->nullable();
            $table->integer('preferred_work_location')->nullable();
            $table->string('expected_salary')->nullable();
            $table->boolean('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_personal_details');
    }
};
