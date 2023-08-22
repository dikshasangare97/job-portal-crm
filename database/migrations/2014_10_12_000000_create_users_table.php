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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('contact_number')->nullable();
            $table->string('register_for')->nullable();
            $table->string('company_info_for')->nullable();
            $table->string('company_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('pin_code')->nullable();
            $table->text('street_address')->nullable();
            $table->boolean('is_active')->default('0');
            $table->boolean('is_user')->default('1');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
