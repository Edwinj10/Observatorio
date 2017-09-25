<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Tesis;
use Session;
use Carbon\Carbon;
use DB;
use Auth;
use Cache;
use App\Contacto;
use Mail;

class BackController extends Controller
{
    public function __construct(){
        // para los midelware
       
        // $this->middleware('auth');
        // $this->middleware('admin', ['only' => ['create', 'destroy', 'edit']]);
    }
    public function index(Request $request)
    {
         if ($request) 
        {

            $query=trim($request->get('searchText'));

            $tesis=DB::table('teses as t')
            ->join('indicadors as i', 't.id_indicador', '=', 'i.id')
            ->select('t.*','i.nombre')
            ->where('t.tema','LIKE', '%'.$query.'%')
            ->orderBy('t.id', 'desc')
            ->paginate(10);

            return view('tesis.listar', ["tesis"=>$tesis, "searchText"=>$query]);
        }
    }
    public function show($id,$id2)
    {     

        
        $nombre=DB::table('indicadors as i')
        ->select('i.*')
        ->where('i.id','=',$id2)
        ->where('institucion_id', '=', $id)
        ->first();

        $inst=DB::table('institucions as in')
        ->select('in.nombres', 'in.mision', 'in.vision', 'in.logo', 'in.direccion')
        ->where('in.id','=',$id)
        ->first();

        $informe=DB::select('CALL indXinstitucion('.$id2.','.$id.');');

        return view('institucion.institucionesid', ["informe"=>$informe,'inst'=>$inst,'nombre'=>$nombre]);
    }
    // logein
    public function mostrar(Request $request, $id)
    {
        // $inputs=Input::all();
        // $id=['capturar'];
        // $id=4;
        if ($request) 
        {
            $query=trim($request->get('searchText'));
            $informe=DB::table('indicadors as i')
            ->join('precios as p', 'i.id', '=', 'p.indicador_id')
            ->join('fechas as f', 'f.id', '=', 'p.id_fecha')
            ->select('i.nombre','i.id', 'f.dia','f.mes','f.anio', 'p.precio')
            ->orderBy('f.id', 'desc')
            ->where('i.id','=',$id)
            // ->where('i.id', '=', $id)
            ->paginate(10);

            $nombre=DB::table('indicadors as i')
            ->select('i.id','i.nombre')
            ->where('i.id','=',$id)
            ->first();

            $indicador=DB::table('indicadors as i')
            ->select('i.id','i.nombre')
            ->get();
        }
            return view('informe.indicadorID', ["informe"=>$informe,'nombre'=>$nombre,'indicador'=>$indicador, "searchText"=>$query]);
            // return $mostrar;
        
        
    }
    public function tesis($id)
    {
            // $tesis=DB::select('CALL tesisPorCarrera('.$id.');');
            $tesis=DB::table('teses as t')
            ->join('carreras as c', 'c.id', 't.id_carrera', 'c.id')
            ->join('indicadors as i', 'i.id', '=', 't.id_indicador')
            ->select('i.*', 't.*', 'c.*')
            ->where('t.id_carrera','=', $id )
            ->paginate(30);
            return view('tesis.index', ["tesis"=>$tesis]);
    }
    public function contacto(Request $request)
    {
        Mail::send('emails.contact',$request->all(), function($msj){
           $msj->subject('Correo de Contacto Para CIIEMP');
           $msj->to('edwinjosealtamirano@gmail.com');
            });
        $correo= new Contacto;
        $correo->name=$request->get('name');
        $correo->email=$request->get('email');
        $correo->descripcion=$request->get('descripcion');
        $correo->save();
        return back()->with('message' , 'Correo Enviado Correctamente');
    }
    public function indicadores_detalles(Request $request, $id)
    {
        if ($request) 
        {
            $query=trim($request->get('searchText'));
            $detalle = DB::table('indicadors as i')
                ->join('institucions as in', 'i.institucion_id', '=', 'in.id')
                ->join('precios as p', 'p.indicador_id', '=', 'i.id')
                ->join('fechas as f', 'f.id', '=', 'p.id_fecha')
                ->join('tipo__indicadors as t', 'i.indicador_id', '=', 't.id')
                ->select('i.nombre','i.id as indicador_id','i.descripcion','t.tipo', 'in.nombres', 'f.id as fecha', 'p.precio', 'f.dia', 'f.mes', 'f.anio')
                ->where('i.id','=', $id)
                ->orderBy('f.id', 'desc')
                ->get();
            // return $detalle;
            $indicador=DB::table('indicadors as i')
            ->join('institucions as ind', 'i.institucion_id', '=', 'ind.id')
            ->select('i.nombre', 'i.id', 'ind.id as ind', 'ind.nombres')
            ->where('i.id', '=', $id)
            ->get();

            $indicador2=DB::table('indicadors as i')
            ->select('i.id','i.nombre')
            ->get();
            
            return view('institucion.tabla', ["detalle"=>$detalle, 'indicador' =>$indicador, 'indicador2' =>$indicador2, "searchText"=>$query]);
        }
    }

    
    // public function show($id)
    // {


    //     // $n;
    //     // $n='Censo Municipal';
    //     $informe=DB::select('CALL datosporindicador('.$id.');');
    //     // $indicador_id=DB::table('indicadors as i')
    //     // ->select('i.*')
    //     // ->where('i.nombre', '=', $n)
    //     // ->get();
    //     // return $indicador_id;

    //     $nombre=DB::table('indicadors as i')

    //     ->select('i.id','i.nombre')
    //     ->where('i.id','=',$id)
    //     ->first();

    //     $indicador=DB::table('indicadors as i')

    //     ->select('i.id','i.nombre')
    //     ->get();

    //     return view('informe.indicadorID', ["informe"=>$informe,'nombre'=>$nombre,'indicador'=>$indicador]);
    // }
    
}
