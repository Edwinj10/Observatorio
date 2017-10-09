<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\Tipo_Indicador;
use App\Boletin;
use App\Indicador;
use App\Institucion;
use Carbon\Carbon;
use Session;
use Redirect;
use DB;
use Auth;


class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'administracion']);
        // para los midelware
        $this->middleware('admin', ['only' => 'administracion']);
        Carbon::setLocale('es');
        
        
        
    }
    
    public function index (Request $request) 
    {

        // $noticias=Noticia::orderBy('id', 'desc')->where('estado', '=','Activo')->where('table')->paginate(6);;;
        if ($request) 
        {

            $query=trim($request->get('searchText'));
            $noticias=DB::table('noticias as n')
            ->join('indicadors as i', 'i.id', '=', 'n.indicador_id')
            ->join('tipo__indicadors  as t', 't.id', '=', 'i.indicador_id')
            ->select('n.*', 't.tipo', 'i.nombre')
            ->where('n.estado', '=', 'Activo')
            ->orderBy('n.id', 'desc')
            ->paginate(6);
            $boletines=Boletin::orderBy('id', 'desc')->paginate(1);;
            // cargar boletines
            // $max= DB::table('boletins')->max('id');
            // $m=$max-1;

            // $maximo=DB::table('boletins as b')
            //     ->select('b.*')
            //     ->where('b.id','=', $m)
            //     ->paginate(1);
            // procedimiento de la tabla de index
            $ind=DB::select("call ultimosPrecios");
            // cargar las imagenes de las instituciones en el carrusel
            $inst = Institucion::paginate(6);
            $menu=Tipo_Indicador::all();
            $comentarios = DB::table('comentarios')->count();
        }
        return view('/index', ["noticias"=>$noticias,  'boletines'=>$boletines , 'inst'=>$inst, 'ind'=>$ind, 'menu' =>$menu, 'comentarios'=>$comentarios,  "searchText"=>$query]);
    }


    public function administracion()
    {
    	
        // if (Auth::user()-> tipo !=0) {
        //     return redirect('/')->with('message' , 'Usted no tiene acceso a esta opcion, ponerse en contacto con el administrador al correo: edwinjosealtamirano@gmail.com');
        // }
        // else
        // {
        return view ('admin.index')->with('message' , 'Bienvenido ');
        // }
        

        
    }
    public function indicadores(Request $request, $id)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));
            $social = DB::table('institucions as i')
            ->join('indicadors as in', 'in.institucion_id', '=', 'i.id')
            ->join('tipo__indicadors as t', 'in.indicador_id', '=', 't.id')
            ->select(DB::raw('i.nombres','t.id', 'in.nombre','i.id'),DB::raw('i.logo'),DB::raw('i.id'),DB::raw('in.institucion_id'), DB::raw('in.indicador_id'),DB::raw('i.direccion'), DB::raw('count(in.nombre) as indicador_count'))
            ->where('in.indicador_id','=', $id)
            ->groupBy('i.nombres', 'i.logo','i.id', 'i.direccion', 'in.institucion_id', 'in.indicador_id')
            ->get();
                    // return $social;


            // $id2;
            // $id2=$id; 'i.institucion_id'
            // return $id2;
            $tipo=Tipo_Indicador::orderBy('id', 'desc')->where('id', '=',$id)->paginate(1);;;
            return view('indicador.listar', ["social"=>$social, "tipo"=>$tipo, "searchText"=>$query]);
        }
        
    }
    public function detalles_indicadores(Request $request, $id, $id2)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));
            $detalle = DB::table('indicadors as i')
            ->join('institucions as in', 'i.institucion_id', '=', 'in.id')
            ->join('tipo__indicadors as t', 'i.indicador_id', '=', 't.id')
            ->select('i.nombre','i.id','i.descripcion','t.tipo', 'in.nombres')
            ->where('in.id','=', $id)
            ->where('i.indicador_id','=', $id2)
            ->orderBy('i.id', 'desc')
            ->get();
            // return $detalle;
            $institucion=Institucion::orderBy('id', 'desc')->where('id', '=',$id)->paginate(1);;;
            return view('institucion.listar', ["detalle"=>$detalle, "institucion"=>$institucion, "searchText"=>$query]);
        }
    }
    public function instituciones(Request $request)
    {
        // $instituciones = DB::table('indicadors as i')
        //             ->join('institucions as in', 'i.institucion_id', '=', 'in.id')
        //             ->select(DB::raw('in.nombres', 'in.id'), DB::raw('i.nombre',  'i.id', 'i.indicador_id'))
        //             ->groupBy('in.nombres', 'i.nombre')
        //             ->orderBy('in.id', 'desc')
        //             ->get();
        //             return $instituciones;

        $instituciones=Institucion::orderBy('id', 'desc')->paginate(20);;;;
        return view ('institucion.todas', ['instituciones'=>$instituciones]);
    }
    public function noticia(Request $request)
    {
        $noticias=Noticia::orderBy('id', 'desc')->where('estado', '=','Activo')->paginate(12);;;
        return view('noticias.todas', ['noticias'=>$noticias]);
    }
    public function noticia_tipo(Request $request, $origen)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));
            $noticia=DB::table('noticias as n')
            ->join('indicadors as i', 'i.id', '=', 'n.indicador_id')
            ->join('tipo__indicadors  as t', 't.id', '=', 'i.indicador_id')
            ->select('n.*', 't.tipo', 'i.nombre')
            ->where('n.estado', '=', 'Activo')
            ->where('n.origen', '=', $origen)
            ->orderBy('n.id', 'desc')
            ->paginate(12);

            $tipo=DB::table('noticias as n')
            ->select('n.origen')
            ->where('n.origen', '=', $origen)
            ->paginate(1);

            return view('noticias.origen', ["noticia"=>$noticia,"tipo"=>$tipo, "searchText"=>$query]);
        }
    }
    public function busqueda(Request $request)

    {
       if ($request) 
       {

        $query=trim($request->get('searchText'));
        $noticia=DB::table('noticias as n')
        ->join('indicadors as i', 'i.id', '=', 'n.indicador_id')
        ->join('tipo__indicadors  as t', 't.id', '=', 'i.indicador_id')
        ->select('n.*', 't.tipo', 'i.nombre')
        ->where('n.estado', '=', 'Activo')
        ->where('n.titulo','LIKE', '%'.$query.'%')
        ->orwhere('n.descripcion','LIKE', '%'.$query.'%')
        ->orderBy('n.id', 'desc')
        ->paginate(20);

        $indicadores=DB::table('indicadors as i')
        ->join('tipo__indicadors as t', 'i.indicador_id', '=', 't.id')
        ->join('institucions as in', 'i.institucion_id', '=', 'in.id')
        ->select('i.*', 't.tipo', 'in.nombres')
        ->where('i.nombre','LIKE', '%'.$query.'%')
        ->orwhere('i.descripcion','LIKE', '%'.$query.'%')
        ->orderBy('i.id', 'desc')
        ->paginate(20);   
    }

    return view('busqueda', ["noticia"=>$noticia, "indicadores"=>$indicadores, "searchText"=>$query]);
}


}
