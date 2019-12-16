<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanhaGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('campanha_grupos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('campanha_id');
            $table->foreign('campanha_id')->references('id')
                                                   ->on('campanhas')
                                                   ->onDelete('cascade');
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')
                                                ->on('grupo')
                                                ->onDelete('cascade');
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
        Schema::dropIfExists('campanha_grupos');
    }
}
