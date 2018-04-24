<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToUsuarioGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario_grupo', function (Blueprint $table) {
            $table->bigInteger('organizacao_id')->unsigned();
            $table->foreign('organizacao_id')->references('id')->on('organizacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario_grupo', function (Blueprint $table) {
            $table->dropForeign(['organizacao_id']);
            $table->dropColumn('organizacao_id');
        });
    }
}
