<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IndicadorRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Indicador;
use App\Precio;
use App\Fecha;
use Session;
use DB;
use Auth;
use Carbon\Carbon;


class IndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // para los midelware
       
        $this->middleware('auth', ['only' => ['create', 'destroy', 'edit', 'index']]);
        $this->middleware('admin',['only' => ['create', 'destroy', 'edit', 'index']]);
        Carbon::setLocale('es');
    }

    public function index(Request $request)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));

            $indicadores=DB::table('indicadors as i')
            ->join('tipo__indicadors as t', 'i.indicador_id', '=', 't.id')
            ->join('institucions as in', 'i.institucion_id', '=', 'in.id')
            ->select('i.nombre', 'i.descripcion', 'i.id', 'i.indicador_id','i.importante', 't.tipo', 'in.nombres', 'i.institucion_id')
            ->where('i.nombre','LIKE', '%'.$query.'%')
            ->orderBy('i.id', 'desc')
            ->paginate(20);
            // return $indicadores;
            $tipo=DB::table('tipo__indicadors as tipos')
            ->select('tipos.tipo', 'tipos.id')
            ->get();
            $ins=DB::table('institucions as i')
            ->select('i.id', 'i.nombres')
            ->get();

            return view('indicador.index', ["indicadores"=>$indicadores, "searchText"=>$query, 'tipo'=>  $tipo, 'ins'=> $ins]);
        }
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo=DB::table('tipo__indicadors as t')
        
        ->select('t.*')
        ->get();
        $ins=DB::table('institucions as i')
        
        ->select('i.*')
        ->get();
        return view ('indicador.create' ,['tipo'=>  $tipo, 'ins'=> $ins]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndicadorRequest $request)
    {
        
        $indicador= new Indicador;
        $indicador->nombre=$request->get('nombre');
        $indicador->indicador_id=$request->get('tipo');
        $indicador->institucion_id=$request->get('institucion_id'); 
        $indicador->importante=$request->get('importante'); 
        $indicador->descripcion=$request->get('descripcion'); 
        $indicador->save();

        // $precio=new Precio;
        // $precio->precio=$request->get('precio');
        // $indicador_id= DB::table('indicadors')->max('id');
        // $precio->indicador_id=$indicador_id;

        // $precio->save();
        

        return redirect('/indicador')->with('message' , 'Creado Correctamente');
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
    public function update(IndicadorRequest $request, $id)
    {
        $indicador = Indicador::findOrFail($id);
        $indicador->nombre=$request->get('nombre');
        $indicador->indicador_id=$request->get('tipo');
        $indicador->institucion_id=$request->get('institucion_id'); 
        $indicador->importante=$request->get('capimportante'); 
        $indicador->descripcion=$request->get('descripcion'); 
        $indicador->update();
        return redirect('/indicador')->with('message' , 'Actualizado Correctamente');
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
