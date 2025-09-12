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
        Schema::create('accessories_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('item_id')->unique(); // Unique ID
            $table->string('item_name'); // e.g. Rubber Gasket, Silicon
            $table->string('unit'); // Roll, Bottle, Packet
            $table->float('available_qty'); // Current stock quantity
            $table->float('reorder_level'); // Minimum threshold
            $table->string('category'); // Consumable / Accessory

            // Foreign key to suppliers table
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessories_inventories');
    }
};
