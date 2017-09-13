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
    
    public function index () 
    {

        $noticia=Noticia::orderBy('id', 'desc')->where('estado', '=','Activo')->paginate(3);;;
        $noticias=Noticia::orderBy('id', 'desc')->paginate(6);;;
        $boletines=Boletin::orderBy('id', 'desc')->paginate(1);;

        $max= DB::table('boletins')->max('id');
        $m=$max-1;

        $maximo=DB::table('boletins as b')
            ->select('b.*')
            ->where('b.id','=', $m)
            ->paginate(1);

        $ind=DB::select("call ultimosPrecios");
        
        $inst = Institucion::paginate(6);
        $menu=Tipo_Indicador::all();

    	return view('/index', ["noticias"=>$noticias, 'noticia'=>$noticia, 'boletines'=>$boletines ,'maximo' =>$maximo, 'inst'=>$inst, 'ind'=>$ind, 'menu' =>$menu]);
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

}
