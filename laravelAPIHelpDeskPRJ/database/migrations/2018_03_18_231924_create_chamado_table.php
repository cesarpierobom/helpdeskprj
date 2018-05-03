<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamado', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string("titulo");
            $table->longText("descricao");
            $table->unsignedTinyInteger('status')->default("1");
            $table->unsignedTinyInteger('encerrado')->default("0");
            $table->bigInteger('autor_id')->unsigned()->nullable();
            $table->foreign('autor_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chamado');
    }
}
