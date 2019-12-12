<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campanha;
use App\Http\Requests\CampanhaRequest;

class CampanhaController extends Controller
{
    public function index()
    {
        //
    }

    public function store(CampanhaRequest $request)
    {
        $newCampanha = new Campanha();
        return $newCampanha->criarCampanhasGrupo($request);
    }

    public function show($id)
    {
        //
    }

    public function update(CampanhaRequest $request, $id)
    {
        $newCampanha = new Campanha();
        return $newCampanha->updateCampanhasGrupo($request,$id);
    }

    public function destroy($id)
    {
        return Campanha::destroy($id);
    }
}
