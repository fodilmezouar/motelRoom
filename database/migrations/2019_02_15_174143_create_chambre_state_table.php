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
            $table->integer('chambre_id')->unsigned();
            $table->integer('reservation_id')->unsigned();
            $table-> foreign('chambre_id')->references('id')->on('chambre')->onDelete('cascade');
            $table-> foreign('reservation_id')->references('id')->on('reservation')->onDelete('cascade');
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
