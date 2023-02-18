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
        Schema::create('formation_referentiels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formation_id');
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
            $table->unsignedBigInteger('referentiel_id');
            $table->foreign('referentiel_id')->references('id')->on('referentiels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formation_referentiels');
    }
};
