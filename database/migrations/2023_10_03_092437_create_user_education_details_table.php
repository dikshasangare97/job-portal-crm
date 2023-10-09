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
        Schema::create('user_education_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('education_name')->nullable();
            $table->string('university_name')->nullable();
            $table->string('course_name')->nullable();
            $table->string('specialization_name')->nullable();
            $table->string('course_type')->nullable();
            $table->string('course_duration_to')->nullable();
            $table->string('course_duration_from')->nullable();
            $table->string('grading_system')->nullable();
            $table->string('marks')->nullable();
            $table->boolean('primary_graduation_status')->default(0);
            $table->string('board_name')->nullable();
            $table->string('passing_out_year')->nullable();
            $table->string('school_medium')->nullable();
            $table->string('total_marks')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_education_details');
    }
};
