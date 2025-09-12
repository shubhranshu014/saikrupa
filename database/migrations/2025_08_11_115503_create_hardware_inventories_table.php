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
        Schema::create('hardware_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('hardware_id')->unique(); // Unique ID
            $table->string('hardware_name'); // e.g. Handle, Hinge
            $table->string('application'); // Door, Window
            $table->string('unit'); // pcs, box, set
            $table->integer('available_qty'); // Quantity available
            $table->integer('reorder_level'); // Alert when stock drops below this
            $table->string('brand'); // e.g. Sobinco, Kinlong
            $table->unsignedBigInteger('supplier_id'); // Foreign Key to suppliers

            // Foreign key constraint
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_inventories');
    }
};
