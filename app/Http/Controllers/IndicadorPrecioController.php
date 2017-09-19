<?php

namespace App\Http\Controllers;

use App\IndicadorPrecio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Indicador;
use App\Precio;
use App\Fecha;
use Session;
use DB;
use Auth;
use Carbon\Carbon;


class IndicadorPrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // para los midelware
       
        $this->middleware('auth', ['only' => ['create', 'destroy', 'edit']]);
        $this->middleware('admin',['only' => ['create', 'destroy', 'edit']]);
    }
    public function index(Request $request)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));

            // $informe=DB::select('CALL `indicadores`();');
            
             $informe=DB::table('indicadors as i')
            ->join('precios as p', 'p.indicador_id', '=', 'i.id')
            ->join('fechas as f', 'p.id_fecha', '=', 'f.id')
            
            ->select(DB::raw('i.nombre'),DB::raw('i.id'), DB::raw('max(p.precio) as precio'), DB::raw('max(f.dia) as dia'),DB::raw('max(f.mes) as mes'),DB::raw('max(f.anio) as anio'))
            //->where('p.id_fecha', '=',max(f.id))
            // agrupamos las dos tabas
           ->groupBy('i.nombre', 'i.id')
           ->orderBy('f.id', 'desc')
            ->paginate(10);
            
            // return $informe;
            return view('informe.index', ["informe"=>$informe, "searchText"=>$query]);
        }
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo=DB::table('indicadors as i')
        ->select('i.*')
        ->get();
       
        return view ('informe.create' ,['tipo'=>  $tipo]);
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $fecha= new Fecha;
        $dia = Carbon::now();
        $dia = $dia->format('d');
        $fecha->dia=$dia;
        $mes = Carbon::now();
        $mes = $mes->format('m');
        $fecha->mes=$mes;
        $anio = Carbon::now();
        $anio = $anio->format('Y');
        $fecha->anio=$anio;
       
         
         $fecha->save();
         $id_fecha= DB::table('fechas')->max('id');


        $precio=new Precio;
        $precio->precio=$request->get('precio');
        $precio->indicador_id=$request->get('indicador_id');
        $precio->id_fecha=$id_fecha; 
        $precio->save();
       
        return redirect('/informe')->with('message' , 'Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IndicadorPrecio  $indicadorPrecio
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        
        $i=DB::table('indicadors as i')
            ->select('i.*')
            ->where('i.id', '=', $id)
            ->first();

        // $mes = Carbon::now();
        // $mes = $mes->format('m');

        $fechas=DB::table('fechas as f')
        ->join('precios as p', 'p.id_fecha', '=', 'f.id')
        ->join('indicadors as i', 'i.id', '=', 'p.indicador_id')
        ->select('f.*', 'p.*')
        ->where('p.indicador_id', '=', $id)
        // ->where('f.mes', '=', $mes)
        ->get();

        // $precios=DB::table('precios as p')
        // ->join('indicadors as i', 'i.id', '=', 'p.indicador_id')
        // ->select('p.*', 'i.*')
        // ->where('i.id', '=', $id)
        // ->get();
        // // return $fechas;
         // 'precios'=> $precios


        return view ('informe.show', ['i'=>$i, 'fechas'=> $fechas,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IndicadorPrecio  $indicadorPrecio
     * @return \Illuminate\Http\Response
     */
    public function edit(IndicadorPrecio $indicadorPrecio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IndicadorPrecio  $indicadorPrecio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndicadorPrecio $indicadorPrecio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IndicadorPrecio  $indicadorPrecio
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndicadorPrecio $indicadorPrecio)
    {
        //
    }
}
