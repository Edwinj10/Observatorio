<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoticiaResquest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Noticia;
use Carbon\Carbon;
use App\User;
use Session;
use DB;
use Auth;
use Cache;
use Image;


class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // para los midelware

        $this->middleware('auth', ['only' => ['create', 'destroy', 'edit', 'index', 'estado']]);
        $this->middleware('admin',['only' => ['create', 'destroy', 'edit', 'index', 'estado']]);
        Carbon::setLocale('es');
    }

    public function index(Request $request)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));

            $noticias=DB::table('noticias as n')
            ->join('indicadors as i', 'n.indicador_id', '=', 'i.id')
            ->join('users as u', 'n.user_id', '=', 'u.id')
            ->select('n.*', 'u.name', 'i.nombre')
            ->where('n.titulo','LIKE', '%'.$query.'%')
            ->orwhere('n.descripcion','LIKE', '%'.$query.'%')
            ->orderBy('n.id', 'desc')
            ->paginate(30);

            $indicador=DB::table('indicadors as i')
            ->select('i.*')
            ->get();

            return view('noticias.index', ["noticias"=>$noticias, "searchText"=>$query, 'indicador'=>$indicador]);
        }
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticiaResquest $request)
    {
        $noticia= new Noticia;
        $noticia->titulo=$request->get('titulo');
        $noticia->descripcion=$request->get('descripcion');
        $noticia->origen=$request->get('origen');
        $noticia->resumen=$request->get('resumen');
        $noticia->total_visitas='0';
        $noticia->estado='Activo';
        // para capturar el id del usuario que esta logeado
        $noticia['user_id']=Auth::user()->id;
        $noticia->indicador_id=$request->get('nombre');
        $fecha = Carbon::now();
        $fecha = $fecha->format('d-m-Y');
        $noticia->fecha=$fecha;
        if($request->hasFile('foto'))
        {
            $foto= $request->file('foto');
            $filename= time(). '.'. $foto->getClientOriginalExtension();
            Image::make($foto)->resize(750,500)->save(public_path('/imagenes/noticias/'.$filename));
            $noticia->foto=$filename;
        }     
        $noticia->save();

        return redirect('/noticias')->with('message' , 'Noticia Creada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia=DB::table('noticias as n')
        ->join('indicadors as i', 'n.indicador_id', '=', 'i.id')
        ->join('users as u', 'n.user_id', '=', 'u.id')
        ->join('tipo__indicadors as t', 'i.indicador_id', '=', 't.id')
        ->select('n.*', 'u.name', 'i.nombre', 't.tipo')
        ->where('n.id','=',$id)
        ->first();
        $variable = Noticia::find($id);

        if(Cache::has($id)==false){
                // Cache::add($id,'contador',0.30);
            Cache::add($id,'contador',0.01);
            $variable->total_visitas++;
            $variable->save();
        }

        $users=DB::table('users as u')
        ->join('noticias as n', 'n.user_id', '=', 'u.id')
        ->select('u.*')
        ->where('n.id', '=',$id)
        ->get();

        $sugerencias=DB::table('noticias as no')
        ->join('indicadors as in', 'no.indicador_id', '=', 'in.id')
        ->join('tipo__indicadors as t', 'in.indicador_id', '=', 't.id')
        ->select('no.*', 't.tipo')
        ->where('t.tipo', '=', $noticia->tipo)
        ->where('no.id', '!=', $noticia->id)
        ->where('no.estado', '=','Activo')
        ->orderBy('no.id', 'desc')
        ->paginate(3);

        $comentario=DB::table('comentarios as c')
        ->join('noticias as n', 'c.noticias_id', '=', 'n.id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->select('c.*', 'n.*', 'u.*')
        ->where('n.id', '=',$id)
        ->where('c.estado', '=', 'Activo')
        ->orderBy('c.id', 'desc')
        ->paginate(10);

        $ultimas=Noticia::orderBy('id', 'desc')->where('estado', '=','Activo')->where('id', '!=', $noticia->id)->paginate(5);;;;

        return view ('noticias.show', ['noticia'=>$noticia, 'users' => $users, 'sugerencias' => $sugerencias, 'ultimas' => $ultimas, 'comentario'=>$comentario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicador=DB::table('indicadors as i')
        ->select('i.*')
        ->get();
        $n = Noticia::find($id);
        return view('noticias.edit',['n'=>$n, 'indicador'=>$indicador]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoticiaResquest $request, $id)
    {
        $noticia= Noticia::findOrFail($id);
        $noticia->titulo=$request->get('titulo');
        $noticia->descripcion=$request->get('descripcion');
        $noticia->origen=$request->get('origen');
        $noticia->resumen=$request->get('resumen');
        $noticia->indicador_id=$request->get('nombre');

        if($request->hasFile('foto'))
        {
            $foto= $request->file('foto');
            $filename= time(). '.'. $foto->getClientOriginalExtension();
            Image::make($foto)->resize(750,500)->save(public_path('/imagenes/noticias/'.$filename));
            $noticia->foto=$filename;
        }
        $noticia->update(); 
        Session::flash('message',' Actualizada Correctamente');
        return Redirect::to('/noticias');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia=Noticia::findOrFail($id);
        if ($noticia->estado=='Inactivo') 
        {
            $noticia->estado='Activo';
            $noticia->update();
            return back()->with('message', 'Estado Modificado a Activo');
        }
        else 
        {
            $noticia->estado='Inactivo';
            $noticia->update();
            return back()->with('message', 'Estado Modificado a Inactivo');
        }
    }
    public function estado($id)
    {
        $noticias=DB::table('noticias as n')
        ->join('indicadors as i', 'n.indicador_id', '=', 'i.id')
        ->join('users as u', 'n.user_id', '=', 'u.id')
        ->select('n.*', 'u.name', 'i.nombre')
        ->where('n.estado', '=', $id)
        ->orderBy('n.id', 'desc')
        ->paginate(30);
        $tipo=DB::table('noticias as no')
        ->select('no.estado')
        ->where('no.estado', '=', $id)
        ->paginate(1);
        return view('noticias.estado', ["noticias"=>$noticias, 'tipo'=>$tipo]);
    }
}
