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
        Schema::create('lead_details', function (Blueprint $table) {
            $table->id();$table->foreignId('lead_id')->constrained('leads')->onDelete('cascade');
            $table->string('product_category');
            $table->integer('width');
            $table->integer('height');
            $table->integer('quantity');
            $table->string('design');
            $table->string('glass_specification');
            $table->string('location');
            $table->decimal('square_feet', 8, 2);
            $table->string('position');
             $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_details');
    }
};
