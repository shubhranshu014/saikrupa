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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->string('movement_id')->unique(); // Unique record ID
            $table->foreignId('item_id')->references('products')->onDelete('cascade'); 
            $table->enum('movement_type', ['IN', 'OUT', 'ADJUSTMENT']);
            $table->float('quantity');
            $table->string('reference')->nullable(); // Linked PO, Invoice, or Job ID
            $table->dateTime('date'); // Movement date

            // Foreign key to stores table
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
