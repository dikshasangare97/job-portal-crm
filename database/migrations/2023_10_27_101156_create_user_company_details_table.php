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
        Schema::create('user_company_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('company_type_id')->constrained('company_types');
            $table->foreignId('industry_type_id')->constrained('industries');
            $table->string('contact_person')->nullable();
            $table->string('contact_person_designation')->nullable();
            $table->string('website_url')->nullable();
            $table->string('phone_number_1')->nullable();
            $table->string('phone_number_2')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('pan_number_name')->nullable();
            $table->string('address_label')->nullable();
            $table->string('company_address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('company_pincode')->nullable();
            $table->string('gstin_number')->nullable();
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_company_details');
    }
};
