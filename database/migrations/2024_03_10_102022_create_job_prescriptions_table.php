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
        Schema::create('job_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_order_id');
            $table->string('right_sph')->nullable();
            $table->string('right_cyl')->nullable();
            $table->string('right_axis')->nullable();
            $table->string('right_add')->nullable();
            $table->string('right_pd')->nullable();
            $table->string('left_sph')->nullable();
            $table->string('left_cyl')->nullable();
            $table->string('left_axis')->nullable();
            $table->string('left_add')->nullable();
            $table->string('left_pd')->nullable();
            $table->string('of_sf')->nullable();
            $table->string('professional_type')->nullable();
            $table->string('professional_name')->nullable();
            $table->string('hospital_name')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('job_order_id')->references('id')->on('job_orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_prescriptions');
    }
};
