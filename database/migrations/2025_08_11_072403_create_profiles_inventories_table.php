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
        Schema::create('profiles_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('profile_id')->unique(); // Unique ID or SKU
            $table->string('profile_name');
            $table->string('profile_type'); // Frame, Sash, Mullion, Bead, etc.
            $table->string('material'); // e.g. UPVC, Aluminum
            $table->string('color'); // e.g. White, Grey, Golden Oak
            $table->integer('length_mm'); // Standard bar length in mm
            $table->integer('available_bars'); // Total bars in stock
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade'); // FK
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles_inventories');
    }
};
