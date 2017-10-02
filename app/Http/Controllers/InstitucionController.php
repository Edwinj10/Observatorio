<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InstitucionesRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Institucion;
use Session;
use Carbon\Carbon;
use DB;
use Auth;
use Cache;
use Image;


class InstitucionController extends Controller
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

            $instituciones=Institucion::orderBy('id', 'desc')->paginate(15);;;
        }

           return view('institucion.index', ["instituciones"=>$instituciones, "searchText"=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view ('institucion/create');  
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstitucionesRequest $request)
    {
        
            $inst = new Institucion();
            $inst->nombres=$request->get('nombres');
            $inst->direccion=$request->get('direccion');
            $inst->mision=$request->get('mision');
            $inst->vision=$request->get('vision');
            if($request->hasFile('logo'))
                {
                    $logo= $request->file('logo');
                    $filename= time(). '.'. $logo->getClientOriginalExtension();
                    Image::make($logo)->resize(750,500)->save(public_path('/imagenes/instituciones/'.$filename));
                    $inst->logo=$filename;
                }  
            $inst->save();
        
            return redirect('/institucion')->with('message' , 'Creada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $inst = Institucion::find($id);
        $inst=DB::table('institucions as in')
            ->select('in.nombres', 'in.mision', 'in.vision', 'in.logo', 'in.direccion')
            ->where('in.id','=',$id)
            ->first();
        $ind = DB::table('institucions as i')
            ->join('indicadors as ind', 'ind.institucion_id', '=', 'i.id')
            ->join('tipo__indicadors as t', 'ind.indicador_id', '=', 't.id')
            ->select(DB::raw('i.nombres','t.id', 'ind.nombre','i.id'),DB::raw('i.id'),DB::raw('t.tipo'),DB::raw('count(t.tipo) as count'),DB::raw('ind.institucion_id'), DB::raw('ind.indicador_id'), DB::raw('t.imagen'))
            ->where('i.id','=', $id)
            ->groupBy('i.nombres', 'i.id', 't.tipo','ind.institucion_id', 'ind.indicador_id', 't.imagen')
            ->get();
        $total = DB::table('indicadors')->where('institucion_id', '=', $id)->count();
        $indicadores=DB::select('CALL todosindicadoreXinstitucion('.$id.');');
        return view('institucion.show',['inst'=>$inst, 'indicadores'=>$indicadores, 'ind'=>$ind, 'total'=>$total]);
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
    public function update(InstitucionesRequest $request, $id)
    {
    
        $inst= Institucion::findOrFail($id);
        $inst->nombres=$request->get('nombres');
        $inst->direccion=$request->get('direccion');
        $inst->mision=$request->get('mision');
        $inst->vision=$request->get('vision');
        if($request->hasFile('logo'))
            {
                $logo= $request->file('logo');
                $filename= time(). '.'. $logo->getClientOriginalExtension();
                Image::make($logo)->resize(750,500)->save(public_path('/imagenes/instituciones/'.$filename));
                $inst->logo=$filename;
            }  

        $inst->update();
        Session::flash('message',' Actualizada Correctamente');
        return Redirect::to('/institucion');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $inst = Institucion::find($id);
        // $inst->delete();
        // Session::flash ('message', 'Eliminado Correctamente');
        // return redirect::to('/institucion');
    }
}
