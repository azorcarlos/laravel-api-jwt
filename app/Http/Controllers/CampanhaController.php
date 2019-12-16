<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campanha;
use App\CampanhaGrupo;
use App\Http\Requests\CampanhaRequest;

class CampanhaController extends Controller
{
    public function index()
    {
        return Campanha::all();
    }

    public function store(CampanhaRequest $request)
    {
        $newCampanha = new Campanha();
        return $newCampanha->criarCampanhasGrupo($request);
    }

    public function show($id)
    {
        return CampanhaGrupo::where('campanha_id',$id)->get();
    }

    public function update(CampanhaRequest $request, $id)
    {
        $newCampanha = new Campanha();
        return $newCampanha->updateCampanhasGrupo($request,$id);
    }

    public function destroy($id)
    {
        $return  = (Campanha::destroy($id) == 1)?true:false;
        return response()->json(['status'=>$return]);
    }
}
