<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosteVidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coste_vidas', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('total');
            $table->unsignedBigInteger('tipo_costes_id');
            $table->foreign('tipo_costes_id')->references('id')->on('tipo_costes')->ondelete('cascade')->onupdate('cascade');
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
        Schema::dropIfExists('coste_vidas');
    }
}
