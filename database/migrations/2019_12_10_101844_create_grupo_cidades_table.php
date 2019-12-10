<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_cidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_grupo')->nullable(false);
            $table->foreign('id_grupo')->references('id')->on('grupo');
            $table->unsignedBigInteger('id_cidade')->nullable(false);
            $table->foreign('id_cidade')->references('id')->on('cidades');
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
        Schema::dropIfExists('grupo_cidades');
    }
}
