<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function index(Request $request)
    {
        
        if ($request) 
        {

            $query=trim($request->get('searchText'));

            $instituciones = Institucion::paginate(10);
        }

           return view('institucion.index', ["instituciones"=>$instituciones, "searchText"=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('institucion/create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('logo'))
        {
            $inst = new Institucion();
            $logo= $request->file('logo');
            $filename= time(). '.'. $logo->getClientOriginalExtension();
            Image::make($logo)->resize(750,500)->save(public_path('/imagenes/instituciones/'.$filename));
            $inst->nombres=$request->get('nombres');
            $inst->direccion=$request->get('direccion');
            $inst->mision=$request->get('mision');
            $inst->vision=$request->get('vision');
            $inst->logo=$filename;
            $inst->save();
        }
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

        $indicadores=DB::select('CALL todosindicadoreXinstitucion('.$id.');');

       
        return view('institucion.show',['inst'=>$inst, 'indicadores'=>$indicadores]);
        
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
        if($request->hasFile('logo'))
        {
            $inst= Institucion::findOrFail($id);
            $logo= $request->file('logo');
            $filename= time(). '.'. $logo->getClientOriginalExtension();
            Image::make($logo)->resize(750,500)->save(public_path('/imagenes/instituciones/'.$filename));
            $inst->nombres=$request->get('nombres');
            $inst->direccion=$request->get('direccion');
            $inst->mision=$request->get('mision');
            $inst->vision=$request->get('vision');
            $inst->logo=$filename;

            $inst->update();
            Session::flash('message',' Actualizada Correctamente');
            return Redirect::to('/institucion');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inst = Institucion::find($id);
        $inst->delete();
        Session::flash ('message', 'Eliminado Correctamente');
        return redirect::to('/institucion');
    }
}
