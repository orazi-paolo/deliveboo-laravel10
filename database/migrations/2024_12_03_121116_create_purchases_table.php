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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId("restaurant_id")->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("name")->nullable(false);
            $table->string("email")->nullable(false);
            $table->string("phone_number")->nullable(false);
            $table->string("address")->nullable(false);
            $table->string("city")->nullable(false);
            $table->dateTime("date")->nullable(false);
            $table->decimal("total", 8, 2, true)->nullable(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};