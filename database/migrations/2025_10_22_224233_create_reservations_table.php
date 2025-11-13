m<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('reservations', function (Blueprint $table) {
                $table->id();
                $table->date('date_arrivee');
                $table->date('date_depart');
                $table->dateTime('date_validation')->nullable();
                $table->integer('personnes')->default(1);
                $table->string('reservation_code', 191)->unique();
                $table->string('status')->default('en_attente'); // en_attente, validee, refusee, annulee
                $table->integer('total')->nullable();
                $table->string('reference', 191)->nullable()->unique();
                $table->unsignedBigInteger('proprietaire_id');
                $table->unsignedBigInteger('residence_id');
                $table->unsignedBigInteger('user_id');
                $table->string('client')->nullable(); // <-- Champ client ajouté
                $table->timestamps();

                // Clés étrangères
                $table->foreign('proprietaire_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('residence_id')->references('id')->on('residences')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('reservations');
        }
    };
