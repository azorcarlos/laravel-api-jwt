<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GrupoRequest;
use App\Grupo;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{

    public function index()
    {
        response()->json(['dados'=>Grupo::all()]);
    }

    public function store(GrupoRequest $request)
    {
        $grupoCidades  = new Grupo();
        return $grupoCidades->saveGrupoCidades($request);

    }

    public function show($id)
    {
       //return Grupo::find($id);
       return DB::table('grupo')
               ->join('grupo_cidades', 'id_grupo', '=', 'grupo.id')
               ->select('grupo.*', 'grupo_cidades.*')
               ->get();

         //return DB::select( DB::raw("select * from grupo limit 2"));
    }

    public function update(Request $request, $id)
    {
        $grupo = new Grupo();
        return $grupo->updateGrupoCidades($request,$id);

    }

    public function destroy($id)
    {
        return response()->json(['status'=>Grupo::destroy($id)]);
    }
}
