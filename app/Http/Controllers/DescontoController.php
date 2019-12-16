<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desconto;
class DescontoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Desconto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Desconto::create([

            'name'=>$request['name'],
            'products'=>$request['products'],
            'price'=>$request['price']

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Desconto::find($id);
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
        $desconto           =  Desconto::find($id);
        $desconto->name     = $request['name'];
        $desconto->products = $request['products'];
        $desconto->price    = $request['price'];
        $desconto->save();
        return $desconto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $return = (Desconto::destroy($id) == 1) ? true : false;
        return response()->json(['status' => $return]);
    }
}
