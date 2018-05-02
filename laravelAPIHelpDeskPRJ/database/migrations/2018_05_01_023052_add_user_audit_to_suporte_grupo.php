<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserAuditToSuporteGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suporte_grupo', function (Blueprint $table) {
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
        Schema::table('suporte_grupo', function (Blueprint $table) {
            $table->dropForeign("suporte_grupo_create_user_id_foreign");
            $table->dropColumn('create_user_id');
            $table->dropForeign("suporte_grupo_update_user_id_foreign");
            $table->dropColumn('update_user_id');
            $table->dropForeign("suporte_grupo_delete_user_id_foreign");
            $table->dropColumn('delete_user_id');
        });
    }
}
