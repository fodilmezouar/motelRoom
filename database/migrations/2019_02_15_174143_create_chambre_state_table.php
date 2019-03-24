<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChambreStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambre_states', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chambre_id')->unsigned()->nullable();
            $table->integer('reservation_id')->unsigned()->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table-> foreign('chambre_id')->references('id')->on('chambres');
            $table-> foreign('reservation_id')->references('id')->on('reservations');
            $table-> foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('chambre_states');
    }
}
