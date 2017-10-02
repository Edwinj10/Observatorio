<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TesisRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Tesis;
use Carbon\Carbon;
use App\User;
use Session;
use DB;
use Auth;
use Cache;
use Image;

class TesisController extends Controller
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
            $tesis=DB::table('teses as t')
            ->join('indicadors as i', 't.id_indicador', '=', 'i.id')
            ->join('carreras as c', 'c.id', '=', 't.id_carrera')
            ->select('t.*','i.nombre', 'c.carrera')
            ->where('t.tema','LIKE', '%'.$query.'%')
            ->orderBy('t.id', 'desc')
            ->paginate(35);

        $indicador=DB::table('indicadors as i')
        ->select('i.*')
        ->get();
        $carreras=DB::table('carreras as c')
        ->select('c.*')
        ->get();

            return view('tesis.index', ["tesis"=>$tesis, "searchText"=>$query, 'indicador'=>$indicador, 'carreras'=>$carreras]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //      $indicador=DB::table('indicadors as i')
    //     ->select('i.*')
    //     ->get();
    //     $carreras=DB::table('carreras as c')
    //     ->select('c.*')
    //     ->get();
    //     return view ('tesis/create', ['indicador'=> $indicador, 'carreras'=> $carreras]);
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TesisRequest $request)
    {
        $tesis= new Tesis;
        $tesis->id_indicador=$request->get('indicador');
        $tesis->tema=$request->get('tema');
        $tesis->introduccion=$request->get('introduccion');
        $tesis->metodologia=$request->get('metodologia');
        $tesis->autor=$request->get('autor');
        $tesis->id_carrera=$request->get('carrera');
        
         if($request->hasFile('imagen'))
        {
            $imagen= $request->file('imagen');
            $filename= time(). '.'. $imagen->getClientOriginalExtension();
            Image::make($imagen)->resize(750,500)->save(public_path('/imagenes/tesis/'.$filename));
            $tesis->imagen=$filename;
        } 
         if (Input::hasFile('archivo')) {
            $file=Input::file('archivo');
            $file->move(public_path().'/archivos/tesis/', $file->getClientOriginalName());
            $tesis->archivo=$file->getClientOriginalName();

        }
        // return $tesis;
        $tesis->save();
           

        return redirect('/tesis')->with('message' , 'Tesis Guardada Correctamente');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tesis=DB::table('teses as t')
            ->join('indicadors as i', 't.id_indicador', '=', 'i.id')
            ->join('carreras as c', 'c.id', '=', 't.id_carrera')
            ->select('t.*','i.nombre', 'c.carrera')
            ->where('t.id','=', $id)
            ->first();
        $sugerencias=DB::table('teses')
            ->join('indicadors', 'teses.id_indicador', '=', 'indicadors.id')
            ->join('carreras', 'carreras.id', '=', 'teses.id_carrera')
            ->select('teses.*', 'carreras.carrera')
            ->where('teses.id','!=', $tesis->id)
             ->orderBy('teses.id', 'desc')
            ->paginate(3);

        return view("tesis.show",array('tesis' =>$tesis, 'sugerencias'=>$sugerencias));
        
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
    public function update(TesisRequest $request, $id)
    {
        $tesis = Tesis::findOrFail($id);
        $tesis->id_indicador=$request->get('capindicador');
        $tesis->tema=$request->get('tema');
        $tesis->introduccion=$request->get('introduccion');
        $tesis->metodologia=$request->get('metodologia');
        $tesis->autor=$request->get('autor');
        $tesis->id_carrera=$request->get('capcarrera');
        
        
         if($request->hasFile('imagen'))
        {
            $imagen= $request->file('imagen');
            $filename= time(). '.'. $imagen->getClientOriginalExtension();
            Image::make($imagen)->resize(750,500)->save(public_path('/imagenes/tesis/'.$filename));
            $tesis->imagen=$filename;
        } 
        if (Input::hasFile('archivo')) {
            $file=Input::file('archivo');
            $file->move(public_path().'/archivos/tesis/', $file->getClientOriginalName());
            $tesis->archivo=$file->getClientOriginalName();

        }
        
        $tesis->update();

        return redirect('/tesis')->with('message' , 'Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = Tesis::find($id);
        $t->delete();
        Session::flash ('message', 'Eliminado Correctamente');
        return redirect::to('/tesis');
    }
}
