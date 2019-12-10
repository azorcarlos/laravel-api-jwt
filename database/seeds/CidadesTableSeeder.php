<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cidades')->insert(
            ['name'=>'Ribeirão Preto']
        );
        DB::table('cidades')->insert(
            ['name'=>'Cravinhos']
        );
        DB::table('cidades')->insert(
            ['name'=>'Barretos']
        );
        DB::table('cidades')->insert(
            ['name'=>'Luis Antônio']
        );
        DB::table('cidades')->insert(
            ['name'=>'São Paulo']
        );
        DB::table('cidades')->insert(
            ['name'=>'Serrana']
        );
        DB::table('cidades')->insert(
            ['name'=>'Poços de Caldas']
        );
    }
}
