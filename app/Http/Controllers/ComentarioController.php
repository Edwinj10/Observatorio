<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Http\Requests\ComentarioRequest;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        // para los midelware
        $this->middleware('admin'); 
    }
    public function index(Request $request)
    {
        $comentarios = DB::table('comentarios as c')
        ->join('noticias as n', 'c.noticias_id', '=', 'n.id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->select('c.*', 'n.titulo', 'u.name', 'u.email')
        // ->where('n.id', '=',$id)
        ->orderBy('c.id', 'desc')
        ->paginate(20);

        return view('comentarios.index')->with('comentarios', $comentarios);
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
    public function store(ComentarioRequest $request)
    {
        $comentarios             = new Comentario;
        $comentarios->comentario = $request->get('comentario');
        // para capturar el id del usuario que esta logeado
        $comentarios['user_id']   = Auth::user()->id;
        $fecha                    = Carbon::now();
        $fecha                    = $fecha->format('d-m-Y');
        $comentarios->fecha       = $fecha;
        $comentarios->estado      = 'Espera';
        $inputs                   = Input::all();
        $vista                    = ['noticia_id'];
        $comentarios->noticias_id = $inputs['noticia_id'];
        $comentarios->save();
        // revisar esta linea de codigo
        return back()->with('message', 'Comentario Creado Correctamente, Se revisara y dentro de unos minutos se publicara Gracias');
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
    public function update(ComentarioRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Comentario::findOrFail($id);
        if ($c->estado=='Espera') 
        {
            $c->estado='Activo';
            $c->update();
            return back()->with('message', 'Estado Modificado a Activo');
        }
        else 
        {
            $c->estado='Espera';
            $c->update();
            return back()->with('message', 'Estado Modificado a Espera');
        }
    }
    public function eliminar($id)
    {
        $c = Comentario::find($id);
        $c->delete();
        return back()->with('message', 'Eliminado Correctamente');
    }
}
