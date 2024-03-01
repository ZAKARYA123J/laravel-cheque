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
        Schema::create('carnets', function (Blueprint $table) {
            $table->id();
            $table->string('socity_id');
            $table->string('compte_id');
            $table->string('type');
            $table->string('numberdocarnet');
            $table->string('Ville');
            $table->string('numberdebut');
            $table->string('numberfin');
            $table->string('datelimite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carnets');
    }
};
