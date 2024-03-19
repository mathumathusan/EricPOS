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
        Schema::create('job_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id');
            $table->string('job_no');
            $table->string('job_code');
            $table->date('job_date');
            $table->date('due_date');
            $table->decimal('frame_amount', 10, 2);
            $table->decimal('lens_amount', 10, 2);
            $table->decimal('paid_amount', 10, 2);
            $table->decimal('discount_amount', 10, 2);
            $table->decimal('balance_amount', 10, 2);
            $table->integer('test_by')->nullable();
            $table->integer('take_by')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('customer_id');

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('status')->default('pending');

            $table->timestamps();
            // Foreign key constraints
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('customer_id')->references('id')->on('customers');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_orders');
    }
};
