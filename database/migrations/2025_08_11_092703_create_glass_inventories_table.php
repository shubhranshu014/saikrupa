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
        Schema::create('glass_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('glass_id')->unique(); // Unique ID
            $table->string('glass_type'); // Clear, Tinted, Laminated, DGU
            $table->float('thickness_mm'); // 4mm, 5mm, etc.
            $table->integer('width_mm'); // Standard width
            $table->integer('height_mm'); // Standard height
            $table->integer('available_sheets'); // Total available sheets
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade'); // FK to suppliers
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glass_inventories');
    }
};
