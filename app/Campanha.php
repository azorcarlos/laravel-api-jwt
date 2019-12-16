<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\CampanhaGrupo;
use Illuminate\Support\Facades\DB;

class Campanha extends Model
{
    //Padrão Carbon
    protected $dates = [
        'starts_at',
        'ends_at',
        'desconto_id'];

    protected $fillable = [
        'name',
        'starts_at',
        'ends_at'
    ];

   // public $timestamps = false;

    public function criarCampanhasGrupo($request)
    {
       $grupo = $request['grupo'];

        if($this->existCampanhaAtiva($grupo)){
           return response()->json(['ok'=>false,'msg'=>'Ja existe uma campanha ativa!']);
        }

        $campanha = Campanha::create(
            [
                'name'=>$request['name'],
                'starts_at'=>$request['starts_at'],
                'ends_at'=>$request['ends_at'],
                'desconto_id'=>$request['id_desconto']
            ]
        );

        if($campanha){
            $idNewGrupo = $campanha->id;
            if(is_array($grupo)){
                foreach ($grupo as $item){
                  CampanhaGrupo::create(['campanha_id'=>$idNewGrupo,'grupo_id'=>$item]);
                }
            }else{
                 CampanhaGrupo::create(['campanha_id'=>$idNewGrupo,'grupo_id'=>$grupo]);

            }
        }
          return response()->json(['ok'=>true,'msg'=>'Campanha cadastrada com Sucesso!']);
    }

    public function updateCampanhasGrupo($request,$id){

           CampanhaGrupo::where('campanha_id',$id)->delete();

            $campanha = Campanha::find($id);
           // $campanha->desconto_id   = $request['id_desconto'];
            $campanha->name      = $request['name'];
            $campanha->starts_at = $request['starts_at'];
            $campanha->ends_at   = $request['ends_at'];

            if($campanha->save()){
                if(is_array($request['grupo'])){
                    foreach ($request['grupo'] as $item){
                        CampanhaGrupo::create(['campanha_id'=>$id,'grupo_id'=>$item]);
                    }
                }else{
                       CampanhaGrupo::create(['campanha_id'=>$id,'grupo_id'=>$request['grupo']]);
                }
                return response()->json(['ok'=>true,'msg'=>'Registro atualizado com sucesso!']);
            }
            return response()->json(['ok'=>false,'msg'=>'Erro ao atualizar os itens da campanha!']);
    }

    public function existCampanhaAtiva($grupo)
    {

        $grupo = (is_array($grupo)?implode(',',$grupo):$grupo);
            return DB::select("select c.id
                    from campanhas c inner join campanha_grupos cg
                    on c.id = cg.campanha_id
                    where cg.grupo_id in({$grupo})
                    and c.starts_at <= current_timestamp
                    and (c.ends_at is null or c.ends_at > current_timestamp)");
        }

}
