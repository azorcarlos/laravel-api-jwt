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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teste = new Grupo();

        if(is_array($request['cidade'])){

            return $teste->saveGrupoAllCidades($request);
        }else{
            $id    = $teste->lastId();
            return Grupo::create(['id'=>$id,'name'=>$request['name'],'id_cidade'=>$request['cidade']]);
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
       return response()->json(['cidades'=>$request['cidade']]);

        foreach ($request['cidade'] as $item) {
            $teste = [$item];

        }
        return ['teste'=>$teste];

        $grupo = Grupo::find($id);
        $grupo->name =  $request['name'];
        $grupo->id_cidade = $request['cidade'];
        $grupo->save();
        return $grupo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
