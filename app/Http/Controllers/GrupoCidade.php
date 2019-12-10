<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;

class GrupoCidade extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Grupo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupoCidades = new Grupo();

        if(is_array($request['cidade'])){
            //Salvar multiplas cidades
            return $grupoCidades->saveGrupoAllCidades($request);

        }else {
            if (!$grupoCidades->where('id_cidade',$request['cidade'])->first()){
                $lastId = $grupoCidades->lastId();
                return $grupoCidades->create(['id' => $lastId, 'name' => $request['name'], 'id_cidade' => $request['cidade']]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Grupo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $update = new Grupo();
        $update->destroy($id);
        if(is_array($request['cidade'])){
            return $update->saveGrupoAllCidades($request->id = $id);

        }else {
            if (!$update->where('id_cidade',$request['cidade'])->first()){
                $lastId = $update->lastId();
                return $update->create(['id' => $lastId, 'id_cidade' => $request['cidade']]);
            }
        }

        return $update;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Grupo::destroy($id);
    }
}
