<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonsTable extends Migration
{
    public function up()
    {
        Schema::create('dons', function (Blueprint $table) {
            $table->id();
            $table->string('nature')->default('Financier');
            $table->string('country_code');
            $table->string('currency_code');
            $table->string('phone');
            $table->decimal('montant', 15, 2);
            $table->string('donateur')->nullable();
            $table->string('email')->nullable();
            $table->string('service');
            $table->string('statut')->default('completed');
            $table->timestamp('date_don')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dons');
    }
}