<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Indicador;
use App\Contacto;
use App\Fecha;
use Session;
use DB;
use Mail;
use Auth;
use Carbon\Carbon;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // para los midelware
       
        $this->middleware('auth', ['only' => ['index', 'destroy', 'edit', 'show']]);
        $this->middleware('admin',['only' => ['index', 'destroy', 'edit', 'show']]);
        Carbon::setLocale('es');
    }
    public function index(Request $request)
    {
        // $correo = Mail::orderBy('id', 'DESC')->paginate(20);
        $correo = Contacto::orderBy('id', 'DESC')->paginate(30);
        // para paginas hay que crear dos listas una para la paginacion y otra para los datos
        // return [
        //         'pagination' => [
        //         'total'         => $correo->total(),
        //         'current_page'  => $correo->currentPage(),
        //         'per_page'      => $correo->perPage(),
        //         'last_page'     => $correo->lastPage(),
        //         'from'          => $correo->firstItem(),
        //         'to'            => $correo->lastItem(),
        //     ],
        //     // segunda lista
        //     'correo' => $correo
        // ];
        return view('correo.index', ["correo"=>$correo]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/contacto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mail::send('emails.contact',$request->all(), function($msj){
           $msj->subject('Correo de Contacto Para CIIEMP');
           $msj->to('ciiempfarem@gmail.com');
            });

        $correo= new Contacto;
        $correo->name=$request->get('name');
        $correo->email=$request->get('email');
        $correo->descripcion=$request->get('descripcion');
        $correo->save();
        return back()->with('message' , 'Correo Enviado Correctamente');
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
        $correo = Contacto::findOrFail($id);
        $correo->delete();
        Session::flash ('message', 'Eliminado Correctamente');
        return redirect::to('/mail');
    }
}
