<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Carreras;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Tesis;
use Carbon\Carbon;
use App\User;
use Session;

class carrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carreras=Carreras::orderBy('id', 'desc')->paginate(20);;
        return view ('carreras.index', ["carreras"=>$carreras]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view ('carreras/create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carreras= new Carreras;
        $carreras->carrera=$request->get('carrera');
        $carreras->save();


        return redirect('/carreras')->with('message' , 'Carrera Guardada Correctamente');

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
        $carreras = Carreras::findOrFail($id);
        $carreras->carrera=$request->get('carrera');
        $carreras->update();

        return redirect('/carreras')->with('message' , 'Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Carreras::find($id);
        $c->delete();
        Session::flash ('message', 'Eliminado Correctamente');
        return redirect::to('/carreras');
    }
}
