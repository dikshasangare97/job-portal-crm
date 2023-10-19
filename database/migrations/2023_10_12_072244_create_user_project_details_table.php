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
        Schema::create('user_project_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('project_title')->nullable();
            $table->string('project_employment_name')->nullable();
            $table->string('project_client_name')->nullable();
            $table->boolean('project_status')->default(0);
            $table->string('worked_from_year')->nullable();
            $table->string('worked_from_month')->nullable();
            $table->string('worked_till_year')->nullable();
            $table->string('worked_till_month')->nullable();
            $table->text('project_detail')->nullable();
            $table->text('project_location')->nullable();
            $table->boolean('project_site')->default(0);
            $table->boolean('nature_of_employment')->default(0);
            $table->integer('team_size')->nullable();
            $table->string('role')->nullable();
            $table->text('role_descripion')->nullable();
            $table->json('skill_used')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_project_details');
    }
};
