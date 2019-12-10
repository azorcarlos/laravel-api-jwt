<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableGrupoCidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupo_cidades', function (Blueprint $table) {
            $table->dropForeign(['id_grupo']);
            $table->foreign('id_grupo')->references('id')->on('grupo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupo_cidades', function (Blueprint $table) {
            //
        });
    }
}
