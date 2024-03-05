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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('cus_id')->unique(); // Assuming a unique identifier for customers (location-based)
            $table->unsignedBigInteger('location_id');
            $table->string('cus_name');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->text('remark')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Foreign key constraint for location_id
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
