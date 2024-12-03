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
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->foreignId("restaurant_id")->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("name")->nullable(false);
            $table->text("description")->nullable();
            $table->text("ingredient_description")->nullable();
            $table->decimal("price", 8, 2, true)->nullable(false);
            $table->boolean("visible")->default(false);
            $table->text("image")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plates');
    }
};