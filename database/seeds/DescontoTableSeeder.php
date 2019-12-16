<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DescontoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desconto')->insert(
            ['name'=>'Desconto Lega','products'=>'Linha telefonica','price'=>'150.99','created_at'=>Carbon::now()]
        );
        DB::table('desconto')->insert(
            ['name'=>'Desconto da Semana','products'=>'Linha modem','price'=>'50.99','created_at'=>Carbon::now()]
        );
        DB::table('desconto')->insert(
            ['name'=>'Desconto de Natal','products'=>'Linha telefonica','price'=>'250.99','created_at'=>Carbon::now()]
        );
        DB::table('desconto')->insert(
            ['name'=>'Desconto Lega fim de ano','products'=>'Linha celular','price'=>'150.99','created_at'=>Carbon::now()]
        );
        DB::table('desconto')->insert(
            ['name'=>'Desconto inicial','products'=>'Agenda','price'=>'1.99','created_at'=>Carbon::now()]
        );
    }
}
