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
            $table->bigInteger('organizacao_id')->unsigned();
            $table->foreign('organizacao_id')->references('id')->on('organizacao');

            $table->bigInteger('analista_id')->unsigned()->nullable();
            $table->foreign('analista_id')->references('id')->on('users');

            $table->bigInteger('responsavel_id')->unsigned()->nullable();
            $table->foreign('responsavel_id')->references('id')->on('users');

            $table->bigInteger('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamento');

            $table->bigInteger('servico_id')->unsigned();
            $table->foreign('servico_id')->references('id')->on('servico');

            $table->bigInteger('chamado_categoria_id')->unsigned();
            $table->foreign('chamado_categoria_id')->references('id')->on('chamado_categoria');

            $table->bigInteger('chamado_situacao_id')->unsigned();
            $table->foreign('chamado_situacao_id')->references('id')->on('chamado_situacao');

            $table->bigInteger('chamado_prioridade_id')->unsigned();
            $table->foreign('chamado_prioridade_id')->references('id')->on('chamado_prioridade');

            $table->bigInteger('chamado_feedback_id')->unsigned()->nullable();
            $table->foreign('chamado_feedback_id')->references('id')->on('chamado_feedback');

            $table->bigInteger('chamado_urgencia_id')->unsigned();
            $table->foreign('chamado_urgencia_id')->references('id')->on('chamado_urgencia');
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
            $table->dropForeign("chamado_organizacao_id_foreign");
            $table->dropForeign("chamado_analista_id_foreign");
            $table->dropForeign("chamado_responsavel_id_foreign");
            $table->dropForeign("chamado_chamado_urgencia_id_foreign");
            $table->dropForeign("chamado_chamado_feedback_id_foreign");
            $table->dropForeign("chamado_chamado_prioridade_id_foreign");
            $table->dropForeign("chamado_chamado_situacao_id_foreign");
            $table->dropForeign("chamado_chamado_categoria_id_foreign");
            $table->dropForeign("chamado_servico_id_foreign");
            $table->dropForeign("chamado_departamento_id_foreign");
            $table->dropColumn('organizacao_id');
            $table->dropColumn('analista_id');
            $table->dropColumn('responsavel_id');
            $table->dropColumn('departamento_id');
            $table->dropColumn('servico_id');
            $table->dropColumn('chamado_categoria_id');
            $table->dropColumn('chamado_situacao_id');
            $table->dropColumn('chamado_prioridade_id');
            $table->dropColumn('chamado_feedback_id');
            $table->dropColumn('chamado_urgencia_id');

        });
    }
}
