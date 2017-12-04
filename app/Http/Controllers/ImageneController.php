<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImagenesRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Imagen;
use App\Noticia;
use Carbon\Carbon;
use App\User;
use Session;
use DB;
use Auth;
use Cache;
use Image;

class ImageneController extends Controller
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
        $imagenes=DB::table('imagens as i')
        ->join('users as u', 'i.user_id', '=', 'u.id')
        ->select('i.*','u.name')
        ->orderBy('i.id', 'desc')
        ->paginate(20);
        return view('imagenes.index', ["imagenes"=>$imagenes]);
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
    public function store(ImagenesRequest $request)
    {
        $imagenes= new Imagen;
        $imagenes->titulo=$request->get('titulo');
        // $imagenes->descripcion=$request->get('descripcion');
        // $imagenes->total_visitas='0';
        // para capturar el id del usuario que esta logeado
        $imagenes['user_id']=Auth::user()->id;
        if($request->hasFile('foto'))
        {
            $foto= $request->file('foto');
            $filename= time(). '.'. $foto->getClientOriginalExtension();
            Image::make($foto)->resize(800,425)->save(public_path('/imagenes/imagenes/'.$filename));
            $imagenes->foto=$filename;
        }     
        $imagenes->save();
        return redirect('/portadas')->with('message' , 'Creada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $imagen = Imagen::find($id);
        // $variable = Imagen::find($id);
        // if(Cache::has($id)==false){
        //         // Cache::add($id,'contador',0.30);
        //     Cache::add($id,'contador',0.01);
        //     $variable->total_visitas++;
        //     $variable->save();
        // }
        // $user=DB::table('imagens as i')
        // ->join('users as u', 'i.user_id', '=', 'u.id')
        // ->select('u.name')
        // ->orderBy('u.id', '=', $imagen->id)
        // ->paginate(1);
        // $noticias=Noticia::orderBy('id', 'desc')->paginate(3);;
        // return view('imagenes.show',['imagen'=>$imagen, 'user'=>$user, 'noticias'=>$noticias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $i = Imagen::find($id);
        // return view('imagenes.edit',['i'=>$i]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImagenesRequest $request, $id)
    {
        $i= Imagen::findOrFail($id);
        $i->titulo=$request->get('titulo');
        // $i->descripcion=$request->get('descripcion');
        if($request->hasFile('foto'))
        {
            $foto= $request->file('foto');
            $filename= time(). '.'. $foto->getClientOriginalExtension();
            Image::make($foto)->resize(800,425)->save(public_path('/imagenes/imagenes/'.$filename));
            $i->foto=$filename;
        }     
        $i->update();
        return redirect('/portadas')->with('message' , 'Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $i = Imagen::find($id);
        $foto =public_path('imagenes/imagenes').'/'.$i->foto;
        unlink($foto);
        $i->delete();
        Session::flash ('message', 'Eliminado Correctamente');
        return redirect::to('/portadas');
    }
}
