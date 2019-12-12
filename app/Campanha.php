<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\CampanhaGrupo;
use Illuminate\Support\Facades\DB;

class Campanha extends Model
{
    //Padrão Carbon
//    protected $dates = [
//        'starts_at',
//        'ends_at'
//    ];

    protected $fillable = [
        'name',
        'starts_at'
    ];

    public function criarCampanhasGrupo($request)
    {
        $campanha = Campanha::create(['name'=>$request['name'],'starts_at'=>Carbon::now()]);
        $grupo = $request['grupo'];

        $return = [];
        if($campanha){

            if(is_array($grupo)){

                foreach ($grupo as $item){
                    return $this->existCampanhaAtiva($item);

                    if(!$this->existCampanhaAtiva($item)){

                        $return = CampanhaGrupo::create(['campanha_id'=>$campanha->id,'grupo_id'=>$item]);

                    }
                   // return $grupo;
                }
            }else{
                if(!$this->existCampanhaAtiva($request['grupo'])){
                    $return = CampanhaGrupo::create(['campanha_id'=>$campanha->id,'grupo_id'=>$grupo]);

                }

            }
        }
        return $return;
    }

    public function existCampanhaAtiva($grupo)
    {
       
        $query = "select c.id
                    from campanhas c inner join campanha_grupos cg 
                    on c.id = cg.campanha_id
                    where cg.grupo_id = {$grupo}
                    and c.starts_at <= current_timestamp 
                    and (c.ends_at is null or c.ends_at > current_timestamp)";
        dd($query);
        return $query;

        return DB::raw($query);
    }
}
