<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            ['name'=>'Ribeirão Preto','state'=>'SP','created_at'=>Carbon::now()]
        );
        DB::table('cidades')->insert(
            ['name'=>'Cravinhos','state'=>'SP','created_at'=>Carbon::now()]
        );
        DB::table('cidades')->insert(
            ['name'=>'Barretos','state'=>'SP','created_at'=>Carbon::now()]
        );
        DB::table('cidades')->insert(
            ['name'=>'Luis Antônio','state'=>'SP','created_at'=>Carbon::now()]
        );
        DB::table('cidades')->insert(
            ['name'=>'São Paulo','state'=>'sp','created_at'=>Carbon::now()]
        );
        DB::table('cidades')->insert(
            ['name'=>'Serrana','state'=>'SP','created_at'=>Carbon::now()]
        );
        DB::table('cidades')->insert(
            ['name'=>'Poços de Caldas','state'=>'MG','created_at'=>Carbon::now()]
        );
    }
}
