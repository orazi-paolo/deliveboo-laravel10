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
        Schema::create('restaurant_tipology', function (Blueprint $table) {
            $table->foreignId("restaurant_id")->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("tipology_id")->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            $table->primary(["restaurant_id", "tipology_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_tipology');
    }
};