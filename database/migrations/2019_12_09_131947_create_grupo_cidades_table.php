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
            $table->bigInteger('id')->nullable();
            $table->string('name')->nullable(false);
            $table->unsignedBigInteger('id_cidade')->nullable(false);
            $table->foreign('id_cidade')->references('id')->on('cidades');
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
