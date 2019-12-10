<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;

class CidadeController extends Controller
{

    public function index()
    {
        return Cidade::all();
    }

    public function store(Request $request)
    {
        return Cidade::create(['name'=>$request['name']]);
    }

    public function show($id)
    {
        return Cidade::all()->find($id);
    }

    public function update(Request $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->name  = $request['name'];
        $cidade->save();
        return $cidade;
    }

    public function destroy($id)
    {
        return Cidade::destroy($id);
    }
}
