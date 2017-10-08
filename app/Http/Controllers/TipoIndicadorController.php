<?php

namespace App\Http\Controllers;

use App\Tipo_Indicador;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\TipoIndicadorRequest;
use Illuminate\Support\Facades\Redirect;
use Image;
use Session;

class TipoIndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // para los midelware

        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {

        if ($request) {

            $query = trim($request->get('searchText'));

            $tipo = DB::table('tipo__indicadors as t')
                ->select('t.*')
                ->where('t.tipo', 'LIKE', '%' . $query . '%')
                ->orderBy('t.id', 'desc')
                ->paginate(20);

            return view('tipoindicador.index', ["tipo" => $tipo, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('tipoindicador/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoIndicadorRequest $request)
    {
        $tipo = new Tipo_Indicador;
        $tipo->tipo = $request->get('tipo');
        if ($request->hasFile('imagen')) 
        {
            $imagen   = $request->file('imagen');
            $filename = time() . '.' . $imagen->getClientOriginalExtension();
            Image::make($imagen)->resize(679, 457)->save(public_path('/imagenes/tipos_indicadores/' . $filename));
            $tipo->imagen = $filename;
        }

        $tipo->save();
        return redirect('/tipo')->with('message', 'Creada Correctamente');
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
        return view('tipoindicador.edit', ['tipo' => Tipo_Indicador::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoIndicadorRequest $request, $id)
    {
        $tipo = Tipo_Indicador::findOrFail($id);
        $tipo->tipo = $request->get('tipo');
        if ($request->hasFile('imagen')) {
            $imagen   = $request->file('imagen');
            $filename = time() . '.' . $imagen->getClientOriginalExtension();
            Image::make($imagen)->resize(679, 457)->save(public_path('/imagenes/tipos_indicadores/' . $filename));
            $tipo->imagen = $filename;
        }

        $tipo->update();
        Session::flash('message', ' Actualizado Correctamente');
        return Redirect::to('/tipo');

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
