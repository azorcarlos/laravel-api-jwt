<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\GrupoCidade;

class Grupo extends Model
{
    protected $fillable     = ['name','starts_at'];
    protected $table        = 'grupo';

    public function saveGrupoCidades($request)
    {
        $return = [];

        $grupo  = $this->create(['name'=>$request['name']]);
        $id     = $grupo->id;
        $return = [];

        if(is_array($request['cidade'])){
            foreach ($request['cidade'] as $item){

                if(!GrupoCidade::where('id_cidade',$item)->first()){
                    $return =  GrupoCidade::create(['id_grupo'=>$id,'id_cidade'=>$item]);
                }else{

                }
            }
        }else{

            if(!GrupoCidade::where('id_cidade',$request['cidade'])->first()){
                $return =  GrupoCidade::create(['id_grupo'=>$id,'id_cidade'=>$request['cidade']]);
            }
        }
        return $return;
    }

    public function updateGrupoCidades($request,$id)
    {

        $return = [];
        $grupo = Grupo::find($id);
        $grupo->name = $request['name'];
        $grupo->save();

        GrupoCidade::where('id_grupo',$id)->delete();
            if(is_array($request['cidade'])){

                foreach ($request['cidade'] as $item){

                    if(!GrupoCidade::where('id_cidade',$item)->first()){
                        $return =  GrupoCidade::create(['id_grupo'=>$id,'id_cidade'=>$item]);
                    }
                }
            }else{

                if(!GrupoCidade::where('id_cidade',$request['cidade'])->first()){
                    $return =  GrupoCidade::create(['id_grupo'=>$id,'id_cidade'=>$request['cidade']]);
                }
            }

        return $return;
    }

    public function getCidades()
    {
        return $this->hasMany('App\GrupoCidade','id_grupo');
    }

}
