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
        Schema::create('traites', function (Blueprint $table) {
            $table->id();
            $table->string('carnet_id');
            $table->date('date_emission')->nullable();
            $table->date('date_paiement')->nullable();
            $table->string('benefisaire')->nullable();
            $table->integer('Montant')->nullable();
            $table->string('Concerne')->nullable();
            $table->string('Remarques')->nullable();
            $table->string('Duplicata_sur')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traites');
    }
};
