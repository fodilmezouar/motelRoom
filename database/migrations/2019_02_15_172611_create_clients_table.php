<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',10)->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('pere')->nullable();
            $table->string('mere')->nullable();
            $table->date('naissance')->nullable();
            $table->string('lieu')->nullable();
            $table->string('adresse')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('job')->nullable();
            $table->string('tel')->nullable();
            $table->string('typePiece',10)->nullable();
            $table->string('numPiece')->nullable();
            $table->date('datePiece')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
