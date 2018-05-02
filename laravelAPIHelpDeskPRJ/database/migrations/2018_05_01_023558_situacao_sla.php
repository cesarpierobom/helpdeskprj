<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SituacaoSla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situacao_sla', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer("tempo");
            $table->unsignedTinyInteger('status')->default("1");
            $table->bigInteger('servico_id')->unsigned();
            $table->foreign('servico_id')->references('id')->on('servico');
            $table->bigInteger('chamado_situacao_id')->unsigned();
            $table->foreign('chamado_situacao_id')->references('id')->on('chamado_situacao');
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('create_user_id')->unsigned()->nullable();
            $table->foreign('create_user_id')->references('id')->on('users');
            $table->bigInteger('update_user_id')->unsigned()->nullable();
            $table->foreign('update_user_id')->references('id')->on('users');
            $table->bigInteger('delete_user_id')->unsigned()->nullable();
            $table->foreign('delete_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('situacao_sla');
    }
}
