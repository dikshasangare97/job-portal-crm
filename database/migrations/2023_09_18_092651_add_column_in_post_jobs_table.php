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
        Schema::dropIfExists('post_jobs');
        Schema::create('post_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('job_headline')->nullable();
            $table->string('employment_type')->nullable();
            $table->text('job_description')->nullable();
            $table->string('key_skill')->nullable();
            $table->foreignId('work_experience')->constrained('experiences');
            $table->string('annual_salary')->nullable();
            $table->boolean('salary_hide_status')->default(0);
            $table->foreignId('location_id')->constrained('locations');
            $table->string('locality')->nullable();
            $table->foreignId('industry_id')->constrained('industries');
            $table->string('functional_area')->nullable();
            $table->foreignId('role_id')->constrained('roles');
            $table->string('reference_code')->nullable();
            $table->string('vacancy')->nullable();
            $table->foreignId('education_qualification_id')->constrained('education');
            $table->foreignId('work_mode_id')->constrained('workmodes');
            $table->foreignId('department_id')->constrained('departments');
            $table->string('company_name')->nullable();
            $table->foreignId('company_type_id')->constrained('company_types');
            $table->text('company_detail')->nullable();
            $table->foreignId('posted_by_id')->constrained('job_posted_bies');
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_jobs', function (Blueprint $table) {
            //
        });
    }
};
