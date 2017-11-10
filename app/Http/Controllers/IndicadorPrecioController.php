<?php

namespace App\Http\Controllers;

use App\IndicadorPrecio;
use Illuminate\Http\Request;
use App\Http\Requests\IndicadorPrecioRequest;
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
       
        $this->middleware('auth', ['only' => ['create', 'destroy', 'edit', 'index', 'editar']]);
        $this->middleware('admin',['only' => ['create', 'destroy', 'edit', 'index', 'editar']]);
        Carbon::setLocale('es');
    }
    public function index(Request $request)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));            
           //   $informe=DB::table('indicadors as i')
           //  ->join('precios as p', 'p.indicador_id', '=', 'i.id')
           //  ->join('fechas as f', 'p.id_fecha', '=', 'f.id')
            
           //  ->select(DB::raw('i.nombre'),DB::raw('i.id'),DB::raw("max(p.id) as Id"), DB::raw('max(p.precio) as precio'), DB::raw('max(f.dia) as dia'),DB::raw('max(f.mes) as mes'),DB::raw('max(f.anio) as anio'))
           //  //->where('p.id_fecha','==',"f.id")
           //  //->where('p.id_fecha', '=',max(f.id))
           //  // agrupamos las dos tabas
           // ->groupBy('i.nombre','i.id')
          // ->orderBy("f.id","desc")
            // ->paginate(4);
              $ind=DB::select("call informeIndicador");
              //$ind = Indicador::paginate(6)
               // $ind = Fecha::paginate(7);
               //$ind = Precio::paginate(6);
              $tipo=DB::table('indicadors as i')
                ->select('i.*')
                ->get();


           // return view('informe.index', ["informe"=>$informe, "searchText"=>$query]);
            return view('informe.index', ["ind"=>$ind,'tipo'=>  $tipo,"searchText"=>$query]);
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
    public function store(IndicadorPrecioRequest $request)
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
        $precio->descripcion=$request->get('descripcion');
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
        $ultimo=DB::table('precios as pre')
        ->join('indicadors as ins', 'pre.indicador_id', '=', 'ins.id' )
        ->select('pre.id', 'pre.descripcion')
        ->where('pre.indicador_id', '=', $id)
        ->orderBy('pre.id', 'desc')
        ->paginate(1);
        // return $ultimo;

        $auxiliar=DB::table('indicadors')
        ->select('indicadors.id')
        ->where('indicadors.id', '=', $id)
        ->get();

        // $mes = Carbon::now();
        // $mes = $mes->format('m');

        $fechas=DB::table('fechas as f')
        ->join('precios as p', 'p.id_fecha', '=', 'f.id')
        ->join('indicadors as i', 'i.id', '=', 'p.indicador_id')
        ->select('f.*', 'p.*', 'i.id as idindi')
        ->where('p.indicador_id', '=', $id)
        ->orderBy('f.mes', 'asc')
        ->orderBy('f.dia', 'asc')
        // ->where('f.mes', '=', $mes)
        ->simplepaginate(15);

        $indicadores=DB::table('indicadors as i')
        ->select('i.*')
        ->orderBy('i.nombre', 'asc')
        ->get();
        // $indicadores=DB::table('indicadors as ind')
        // ->join('precios as pre', 'pre.indicador_id', '=', 'ind.id')
        // ->join('fechas as fec', 'pre.id_fecha', '=', 'fec.id')
        // ->select('i.nombre', 'i.descripcion', 'i.id', 'i.indicador_id','i.importante', 't.tipo', 'in.nombres', 'i.institucion_id')        
        // ->select(DB::raw('ind.nombre','ind.id'),  DB::raw('ind.id'))
        // ->orderBy('ind.nombre', 'asc')
        // ->groupBy('ind.nombre', 'ind.id')
        // ->get();
        // return $indicadores;

        // $precios=DB::table('precios as p')
        // ->join('indicadors as i', 'i.id', '=', 'p.indicador_id')
        // ->select('p.*', 'i.*')
        // ->where('i.id', '=', $id)
        // ->get();
        // // return $fechas;
         // 'precios'=> $precios


        return view ('informe.show', ['i'=>$i, 'fechas'=> $fechas,  'indicadores'=>$indicadores, 'auxiliar'=>$auxiliar, 'ultimo'=>$ultimo]);
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
    public function update(IndicadorPrecioRequest $request,$indicadorPrecio)
    {
        $precio = Precio::findOrFail($indicadorPrecio);
        $precio->precio=$request->get('precio');
        $precio->descripcion=$request->get('descripcion');
        //return $precio;
        $precio->update();

        return redirect('/informe')->with('message' , 'Actualizado Correctamente');
    }
    public function editar(IndicadorPrecioRequest $request, $id)
    {
        $precio = Precio::findOrFail($id);
        $precio->precio=$request->get('precio');
        $precio->descripcion=$request->get('descripcion');
        //return $precio;
        $precio->update();
        return back()->with('message', 'Actualizado Correctamente');
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
