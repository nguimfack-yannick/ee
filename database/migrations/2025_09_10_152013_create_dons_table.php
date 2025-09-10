<?php
// database/migrations/xxxx_xx_xx_create_dons_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Crée la table 'dons' dans la base de données
    public function up(): void
    {
        Schema::create('dons', function (Blueprint $table) {
            $table->id();
            $table->string('nature'); // Type de don : Financier, Matériel, Bénévole
            $table->string('country'); // Code du pays, ex. : CM
            $table->string('currency'); // Devise, ex. : XAF
            $table->string('phone'); // Numéro de téléphone
            $table->decimal('amount', 10, 2)->nullable(); // Montant pour les dons financiers, en devise locale ou €
            $table->string('name'); // Nom ou Anonyme
            $table->string('email'); // Adresse e-mail
            $table->string('service')->nullable(); // Opérateur mobile pour les dons financiers : ORANGE, MTN
            $table->text('comment')->nullable(); // Commentaire facultatif
            $table->timestamps(); // Horodatage de création et mise à jour
        });
    }

    // Supprime la table 'dons' si nécessaire
    public function down(): void
    {
        Schema::dropIfExists('dons');
    }
};