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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code')->unique();
            $table->string('product_name');
            $table->enum('type', ['single', 'variable']);
            $table->unsignedBigInteger('unit_id');
            $table->string('product_img')->nullable();
            $table->string('price')->nullable();
            $table->unsignedBigInteger('brand_id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('sub_category_id')->unsigned()->nullable();
            $table->boolean('enable_stock')->default(0);
            $table->decimal('alert_quantity', 22, 4)->default(0);
            $table->enum('barcode_type', ['C39','C128','EAN13','EAN8','UPCA','UPCE'])->default('C128');
            $table->unsignedBigInteger('created_by');
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            //Indexing
            $table->index('product_name');
            $table->index('unit_id');
            $table->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
