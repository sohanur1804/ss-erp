<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->date('purchase_date');
            $table->string('bil_type');
            $table->unsignedBigInteger('trader_id');
            $table->string('invoice_number')->unique();
            $table->string('narration');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('stock');
            $table->string('unit');
            $table->float('discount');
            $table->decimal('unit_price', 10, 2);
            $table->string('serial_number');
            $table->timestamps();

            $table->foreign('trader_id')->references('id')->on('traders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
