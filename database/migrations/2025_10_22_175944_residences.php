<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('residences', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('pays');
            $table->string('ville');
            $table->string('quartier')->nullable();
            $table->integer('nombre_chambres')->default(0);
            $table->integer('nombre_salons')->default(0);
            $table->integer('prix_journalier')->default(0);
            $table->string('type_residence'); // Villa, Appartement, Studio...
            $table->text('description')->nullable();
            $table->boolean('disponible')->default(true);
            $table->date('date_disponible_apres')->nullable();
            $table->string('geolocalisation')->nullable();
            $table->text('img')->nullable();
            $table->unsignedBigInteger('proprietaire_id');
            $table->string('statut')->default('en_attente'); // optionnel
            $table->timestamps();

            $table->foreign('proprietaire_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('residences');
    }
};
