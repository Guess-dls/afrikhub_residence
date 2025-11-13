<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('contact')->nullable();
            $table->string('password');

            // ---- Champs ajoutés ----
            $table->string('type_compte')->default('client'); // client | proprietaire | admin
            $table->string('statut')->default('actif');       // actif | inactif | suspendu
            $table->string('token')->nullable();              // token perso si besoin

            $table->rememberToken();
            $table->timestamps(); // created_at + updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};
