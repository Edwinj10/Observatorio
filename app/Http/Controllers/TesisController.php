<?php

namespace App\Http\Controllers;

use App\Http\Requests\TesisRequest;
use App\Tesis;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;

class TesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $tesis = DB::table('teses as t')
                ->join('indicadors as i', 't.id_indicador', '=', 'i.id')
                ->join('carreras as c', 'c.id', '=', 't.id_carrera')
                ->select('t.*', 'i.nombre', 'c.carrera')
                ->where('t.tema', 'LIKE', '%' . $query . '%')
                ->orderBy('t.id', 'desc')
                ->paginate(10);

            return view('tesis.index', ["tesis" => $tesis, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indicador = DB::table('indicadors as i')

            ->select('i.*')
            ->get();

        $carreras = DB::table('carreras as c')

            ->select('c.*')
            ->get();
        return view('tesis/create', ['indicador' => $indicador, 'carreras' => $carreras]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TesisRequest $request)
    {
        $tesis               = new Tesis;
        $tesis->id_indicador = $request->get('indicador');
        $tesis->tema         = $request->get('tema');
        $tesis->introduccion = $request->get('introduccion');
        $tesis->autor        = $request->get('autor');

        if ($request->hasFile('imagen')) {
            $imagen   = $request->file('imagen');
            $filename = time() . '.' . $imagen->getClientOriginalExtension();
            Image::make($imagen)->resize(750, 500)->save(public_path('/imagenes/tesis/' . $filename));
            $tesis->imagen = $filename;
        }

        if (Input::hasFile('archivo')) {
            $file = Input::file('archivo');
            $file->move(public_path() . '/archivos/tesis/', $file->getClientOriginalName());
            $tesis->archivo = $file->getClientOriginalName();

        }

        $tesis->id_carrera = $request->get('carrera');

        $tesis->save();

        return redirect('/tesis')->with('message', 'tesis guardada correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tesis = Tesis::find($id);
        return view("tesis.show", array('tesis' => $tesis));
        return $tesis;
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
        $tesis               = Tesis::findOrFail($id);
        $tesis->id_indicador = $request->get('indicador');
        $tesis->tema         = $request->get('tema');
        $tesis->introduccion = $request->get('introduccion');
        $tesis->autor        = $request->get('autor');
        if ($request->hasFile('imagen')) {
            $imagen   = $request->file('imagen');
            $filename = time() . '.' . $imagen->getClientOriginalExtension();
            Image::make($imagen)->resize(750, 500)->save(public_path('/imagenes/tesis/' . $filename));
            $tesis->imagen = $filename;
        }

        if (Input::hasFile('archivo')) {
            $file = Input::file('archivo');
            $file->move(public_path() . '/archivos/tesis/', $file->getClientOriginalName());
            $tesis->archivo = $file->getClientOriginalName();

        }
        $tesis->update();

        return redirect('/tesis')->with('massage', 'Actualizado');

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
