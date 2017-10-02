<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BoletinRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Boletin;
use Session;
use DB;
use Auth;
use Cache;
use Image;
class BoletinController extends Controller
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
    public function index()
    {
        $boletin=Boletin::orderBy('id', 'desc')->paginate(10);;
        return view ('boletin.index', ["boletin"=>$boletin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view ('boletin.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoletinRequest $request)
    {
        $boletin= new Boletin;
        $boletin->url=$request->get('url');
        $boletin->descripcion=$request->get('descripcion');
        $boletin['user_id']=Auth::user()->id;
        $dia = Carbon::now();
        $dia = $dia->format('d');
        $boletin->dia=$dia;
        $mes = Carbon::now();
        $mes = $mes->format('m');
        $boletin->mes=$mes;
        $anio = Carbon::now();
        $anio = $anio->format('Y');
        $boletin->anio=$anio;
        if (Input::hasFile('archivo')) 
        {
            $file=Input::file('archivo');
            $file->move(public_path().'/archivos/boletines/', $file->getClientOriginalName());
            $boletin->archivo=$file->getClientOriginalName();

        }
        if($request->hasFile('portada'))
        {
            $portada= $request->file('portada');
            $filename= time(). '.'. $portada->getClientOriginalExtension();
            Image::make($portada)->resize(750,500)->save(public_path('/imagenes/boletines/'.$filename));
            $boletin->portada=$filename;
        } 
        $boletin->save();
        return redirect('/boletin')->with('message' , 'Creado Correctamente');
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
    public function update(BoletinRequest $request, $id)
    {
        $boletin = Boletin::findOrFail($id);
        $boletin->url=$request->get('url');
        $boletin->descripcion=$request->get('descripcion');
        if (Input::hasFile('archivo')) {
            $file=Input::file('archivo');
            $file->move(public_path().'/archivos/boletines/', $file->getClientOriginalName());
            $boletin->archivo=$file->getClientOriginalName();

        }
        if($request->hasFile('portada'))
        {
            $portada= $request->file('portada');
            $filename= time(). '.'. $portada->getClientOriginalExtension();
            Image::make($portada)->resize(750,500)->save(public_path('/imagenes/boletines/'.$filename));
            $boletin->portada=$filename;
        } 
        $boletin->update();
        return redirect('/boletin')->with('message' , 'Actualizado Correctamente');
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
