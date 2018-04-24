<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToChamadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chamado', function (Blueprint $table) {
            $table->bigInteger('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamento');

            $table->bigInteger('servico_id')->unsigned();
            $table->foreign('servico_id')->references('id')->on('servico');

            $table->bigInteger('chamado_categoria_id')->unsigned();
            $table->foreign('chamado_categoria_id')->references('id')->on('chamado_categoria');

            $table->bigInteger('chamado_situacao_id')->unsigned();
            $table->foreign('chamado_situacao_id')->references('id')->on('chamado_situacao');

            $table->bigInteger('chamado_prioridade')->unsigned();
            $table->foreign('chamado_prioridade')->references('id')->on('chamado_prioridade');

            $table->bigInteger('chamado_feedback')->unsigned()->nullable();
            $table->foreign('chamado_feedback')->references('id')->on('chamado_feedback');

            $table->bigInteger('chamado_urgencia')->unsigned();
            $table->foreign('chamado_urgencia')->references('id')->on('chamado_urgencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chamado', function (Blueprint $table) {
            //
        });
    }
}
