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
        Schema::create('plate_purchase', function (Blueprint $table) {
            $table->foreignId("plate_id")->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("purchase_id")->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            $table->primary(["plate_id", "purchase_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plate_purchase');
    }
};