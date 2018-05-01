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
            $table->bigInteger('create_user')->unsigned()->nullable();
            $table->foreign('create_user')->references('id')->on('users');
            $table->bigInteger('update_user')->unsigned()->nullable();
            $table->foreign('update_user')->references('id')->on('users');
            $table->bigInteger('delete_user')->unsigned()->nullable();
            $table->foreign('delete_user')->references('id')->on('users');
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
            $table->dropForeign("suporte_grupo_create_user_foreign");
            $table->dropColumn('create_user');
            $table->dropForeign("suporte_grupo_update_user_foreign");
            $table->dropColumn('update_user');
            $table->dropForeign("suporte_grupo_delete_user_foreign");
            $table->dropColumn('delete_user');
        });
    }
}
