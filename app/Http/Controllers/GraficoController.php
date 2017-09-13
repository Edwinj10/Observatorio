<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grafico;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use Auth;
use App\Indicador;
use App\Fecha;
class GraficoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graficos=DB::table('indicadors as i')
            ->join('precios as p', 'p.indicador_id', '=', 'i.id')
            ->join('fechas as f', 'i.id_fechas', '=', 'f.id')
            ->select('i.*', 'f.*', 'p.*')->get();

        return view('graficos.index', ["graficos"=>$graficos]);

        $graficos=Indicador::
        select('fechas.dia', 'indicadors.nombre', 'precios.precio')
        ->join('fechas', 'fechas.id', '=', 'indicadors.id_fechas', 'precios.indicador_id', '=', 'indicadors.id')->get();
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
    public function store(Request $request)
    {
        //
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
        //
    }
}
