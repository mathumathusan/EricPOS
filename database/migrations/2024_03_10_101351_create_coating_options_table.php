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
        Schema::create('coating_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coating_brand_id');
            $table->string('name');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_active')->default(true);

            $table->softDeletes();
            $table->timestamps();

             // Foreign key constraint
             $table->foreign('coating_brand_id')->references('id')->on('coating_brands')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coating_options');
    }
};
