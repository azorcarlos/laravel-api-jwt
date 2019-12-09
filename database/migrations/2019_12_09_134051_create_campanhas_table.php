<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('campanhas', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('name')->nullable(false);
            $table->bigInteger('id_grupo_cidade');
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campanhas');
    }
}
