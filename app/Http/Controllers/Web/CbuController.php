<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cbu;
use App\Models\Comercio;
use DataTables;
use Auth;

class CbuController extends Controller
{
    public function source(Comercio $comercio){

        $cbus = $comercio->CBUs;

        foreach($cbus as $cbu){
            $cbu->actions = $cbu->id.'%%'.$cbu->alias.'%%'.$cbu->cbu;
        }
        
        return DataTables::collection($cbus)->make(true);
    }

    public function lista(Comercio $comercio){

        return view('cbu', compact('comercio'));
    }
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $cbu = new Cbu();
        $cbu->alias = $request->alias;
        $cbu->cbu = $request->cbu;
        $cbu->comercio_id = $request->comercio_id;

        if($cbu->save()){
            return response()->json(['status' => 'success']);
        }else{
            return response()->json(['status' => 'error', 'msg' => 'Ha ocurrido un error inesperado']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $cbu = Cbu::find($id);

        if($cbu->comercio->user_id != Auth::user()->id){
            return response()->json(['status' => 'error', 'no tienes autorizacion para modificar este cbu'], 403);
        }

        $cbu->alias = $request->alias;
        $cbu->cbu = $request->cbu;

        if($cbu->update()){
            return response()->json(['status' => 'success']);
        }else{
            return response()->json(['status' => 'error', 'msg' => 'Ha ocurrido un error inesperado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cbu = Cbu::find($id);

        if($cbu->comercio->user_id != Auth::user()->id){
            return response()->json(['status' => 'error', 'no tienes autorizacion para modificar este cbu'], 403);
        }

        if($cbu->delete()){
            return response()->json(['status' => 'success']);
        }else{
            return response()->json(['status' => 'error', 'msg' => 'Ha ocurrido un error inesperado']);
        }
    }
}
