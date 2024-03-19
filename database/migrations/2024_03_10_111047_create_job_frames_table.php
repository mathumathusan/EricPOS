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
        Schema::create('job_frames', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('model_no')->nullable();
            $table->string('type')->nullable();
            $table->string('option')->nullable();
            $table->unsignedBigInteger('shape_id')->nullable();
            $table->string('lens_variety')->nullable();
            $table->string('lens_index')->nullable();
            $table->string('lens_type')->nullable();
            $table->string('coating_brand')->nullable();
            $table->unsignedBigInteger('coating_brand_id')->nullable();
            $table->unsignedBigInteger('coating_option_id')->nullable();
            $table->string('tint')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('job_id')->references('id')->on('job_orders')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->foreign('shape_id')->references('id')->on('frame_shapes')->onDelete('set null');
            $table->foreign('coating_brand_id')->references('id')->on('coating_brands')->onDelete('set null');
            $table->foreign('coating_option_id')->references('id')->on('coating_options')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_frames');
    }
};
