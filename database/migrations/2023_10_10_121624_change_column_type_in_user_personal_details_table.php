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
        Schema::table('user_personal_details', function (Blueprint $table) {
            $table->string('total_experience_year')->nullable()->change();
            $table->string('total_experience_month')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_personal_details', function (Blueprint $table) {
            $table->integer('total_experience_year')->nullable()->change();
            $table->integer('total_experience_month')->nullable()->change();
        });
    }
};
