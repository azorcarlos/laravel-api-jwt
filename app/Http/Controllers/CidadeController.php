<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CidadeRequest;
use App\Cidade;

class CidadeController extends Controller
{

    public function index()
    {
        return Cidade::all();
    }

    public function store(CidadeRequest $request)
    {
        return Cidade::create(['name'=>$request['name'],'state'=>$request['state']]);
    }

    public function show($id)
    {
        return Cidade::all()->find($id);
    }

    public function update(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->name  = $request['name'];
        $cidade->state  = $request['state'];
        $cidade->save();
        return $cidade;
    }

    public function destroy($id)
    {
        $return  = (Cidade::destroy($id) == 1)?true:false;
        $cidades = Cidade::all();
        return response()->json(['status'=>$return,'lista'=>$cidades]);
    }
}
