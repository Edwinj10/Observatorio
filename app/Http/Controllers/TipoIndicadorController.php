<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Tipo_Indicador;
use Session;
use DB;
use Auth;


class TipoIndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // para los midelware
       
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        
        if ($request) 
        {

            $query=trim($request->get('searchText'));

            $tipo=DB::table('tipo__indicadors as t')
            ->select('t.*')
            ->where('t.tipo','LIKE', '%'.$query.'%')
            ->orderBy('t.id', 'desc')
            ->paginate(10);

            return view('tipoindicador.index', ["tipo"=>$tipo, "searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('tipoindicador/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo= new Tipo_Indicador;
        $tipo->tipo=$request->get('tipo');

        $tipo->save();

        return redirect('/tipo')->with('message' , 'Creada Correctamente');

        
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
        return view ('tipoindicador.edit', ['tipo'=>Tipo_Indicador::findOrFail($id)]);
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
        $tipo= Tipo_Indicador::findOrFail($id);

        $tipo->tipo=$request->get('tipo');

        $tipo->save();

        return redirect('/tipo')->with('message' , 'Actualizado Correctamente');
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
