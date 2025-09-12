<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name'); // Name of the product
            $table->string('category'); // e.g., Door, Window
            $table->string('dimensions')->nullable(); // Optional: H × W
            $table->decimal('selling_price', 10, 2); // Price for sale
            $table->decimal('cost_price', 10, 2)->nullable(); // Auto-calculated from BOM
            $table->integer('quantity'); // Quantity in stock
            $table->timestamps();
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
