<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table        = 'grupo_cidades';
    public    $incrementing = false;
    public    $timestamps   = false;
    protected $fillable     = ['name', 'id_cidade','id'];

    public function saveGrupoAllCidades($request)
    {

        $return = [];
        $id     = $this->lastId();
        foreach ($request['cidade'] as $item){

            $return =  $this->firstOrCreate(['id'=>$id,'name'=>$request['name'],'id_cidade'=>$item]);
        }
        return $return;
    }

    public function lastId()
    {
        return ($this->all()->max('id'))?$this->all()->max('id')+1:1;

    }
}
