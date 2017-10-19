<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Tesis;
use App\Indicador;
use App\Tipo_Indicador;
use DB;
use Illuminate\Http\Request;
use Mail;

class BackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['comentarios', 'mostrar']]);
        $this->middleware('admin',['only' => ['comentarios', 'mostrar']]);
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
            ->simplepaginate(50);
            $carreras=DB::table('carreras as car')
            ->select('car.carrera', 'car.id')
            ->orderBy('car.carrera', 'asc')
            ->get();
            return view('tesis.listar', ["tesis"=>$tesis, "carreras"=>$carreras, "searchText"=>$query]);
        }
    }
    public function show($id, $id2)
    {

        $nombre = DB::table('indicadors as i')
        ->select('i.*')
        ->where('i.id', '=', $id2)
        ->where('institucion_id', '=', $id)
        ->first();

        $inst = DB::table('institucions as in')
        ->select('in.nombres', 'in.mision', 'in.vision', 'in.logo', 'in.direccion')
        ->where('in.id', '=', $id)
        ->first();

        $informe = DB::select('CALL indXinstitucion(' . $id2 . ',' . $id . ');');

        return view('institucion.institucionesid', ["informe" => $informe, 'inst' => $inst, 'nombre' => $nombre]);
    }
    // logein
    public function mostrar(Request $request, $id)
    {
        // $inputs=Input::all();
        // $id=['capturar'];
        // $id=4;
        if ($request) {
            $query   = trim($request->get('searchText'));
            $informe = DB::table('indicadors as i')
            ->join('precios as p', 'i.id', '=', 'p.indicador_id')
            ->join('fechas as f', 'f.id', '=', 'p.id_fecha')
            ->select('i.nombre', 'i.id', 'f.dia', 'f.mes', 'f.anio', 'p.precio')
            ->orderBy('f.id', 'desc')
            ->where('i.id', '=', $id)
            // ->where('i.id', '=', $id)
            ->paginate(10);

            $nombre = DB::table('indicadors as i')
            ->select('i.id', 'i.nombre')
            ->where('i.id', '=', $id)
            ->first();

            $indicador = DB::table('indicadors as i')
            ->select('i.id', 'i.nombre')
            ->get();
        }
        return view('informe.indicadorID', ["informe" => $informe, 'nombre' => $nombre, 'indicador' => $indicador, "searchText" => $query]);
        // return $mostrar;

    }
    public function tesis($id)
    {
        // $tesis=DB::select('CALL tesisPorCarrera('.$id.');');
        $tesis = DB::table('teses as t')
        ->join('carreras as c', 'c.id', 't.id_carrera', 'c.id')
        ->join('indicadors as i', 'i.id', '=', 't.id_indicador')
        ->select('i.*', 't.*', 'c.*')
        ->where('t.id_carrera', '=', $id)
        ->simplepaginate(50);
        $tesis2 = DB::table('teses as tes')
        ->join('carreras as car', 'car.id', 'tes.id_carrera', 'car.id')
        ->select('car.carrera', 'car.id')
        ->where('car.id', '=', $id)
        ->paginate(1);
        $carreras=DB::table('carreras as car')
        ->select('car.carrera', 'car.id')
        ->orderBy('car.carrera', 'asc')
        ->get();
        return view('tesis.tesiscarreras', ["tesis" => $tesis, 'tesis2'=>$tesis2, 'carreras'=>$carreras]);
    }
    public function contacto(Request $request)
    {
        Mail::send('emails.contact', $request->all(), function ($msj) {
            $msj->subject('Correo de Contacto Para CIIEMP');
            $msj->to('edwinjosealtamirano@gmail.com');
        });
        $correo              = new Contacto;
        $correo->name        = $request->get('name');
        $correo->email       = $request->get('email');
        $correo->descripcion = $request->get('descripcion');
        $correo->save();
        return back()->with('message', 'Correo Enviado Correctamente');
    }
    public function indicadores_detalles(Request $request, $id)
    {
        if ($request) {
            $query   = trim($request->get('searchText'));
            $detalle = DB::table('indicadors as i')
            ->join('institucions as in', 'i.institucion_id', '=', 'in.id')
            ->join('precios as p', 'p.indicador_id', '=', 'i.id')
            ->join('fechas as f', 'f.id', '=', 'p.id_fecha')
            ->join('tipo__indicadors as t', 'i.indicador_id', '=', 't.id')
            ->select('i.nombre', 'i.id as indicador_id', 'i.descripcion', 't.tipo', 'in.nombres', 'f.id as fecha', 'p.precio', 'f.dia', 'f.mes', 'f.anio')
            ->where('i.id', '=', $id)
            ->orderBy('f.id', 'desc')
            ->simplepaginate(50);
            // return $detalle;
            $indicador = DB::table('indicadors as i')
            ->join('institucions as ind', 'i.institucion_id', '=', 'ind.id')
            ->select('i.nombre', 'i.id', 'ind.id as ind', 'ind.nombres')
            ->where('i.id', '=', $id)
            ->get();

            $indicador2 = DB::table('indicadors as i')
            ->select('i.id', 'i.nombre')
            ->orderBy('i.nombre', 'asc')
            ->get();

            return view('institucion.tabla', ["detalle" => $detalle, 'indicador' => $indicador, 'indicador2' => $indicador2, "searchText" => $query]);
        }
    }
    public function informe_fechas(Request $request, $fecha, $id)
    {
        $i = DB::table('indicadors as i')
        ->select('i.*')
        ->where('i.id', '=', $id)
        ->first();

        // $mes = Carbon::now();
        // $mes = $mes->format('m');

        $fechas = DB::table('fechas as f')
        ->join('precios as p', 'p.id_fecha', '=', 'f.id')
        ->join('indicadors as i', 'i.id', '=', 'p.indicador_id')
        ->select('f.*', 'p.*')
        ->where('p.indicador_id', '=', $id)
        ->where('f.mes', '=', $fecha)
        ->simplepaginate(15);

        $indicadores=DB::table('indicadors as i')
        ->select('i.*')
        ->orderBy('i.nombre', 'asc')
        ->get();

        // $precios=DB::table('precios as p')
        // ->join('indicadors as i', 'i.id', '=', 'p.indicador_id')
        // ->select('p.*', 'i.*')
        // ->where('i.id', '=', $id)
        // ->get();
        // // return $fechas;
        // 'precios'=> $precios
        return view('informe.fechas', ['i' => $i, 'fechas' => $fechas, 'indicadores'=>$indicadores]);
    }
    public function meses(Request $request, $id)
    {

        $i=DB::table('indicadors as i')
        ->select('i.*')
        ->where('i.id', '=', $id)
        ->first();

        // $mes = Carbon::now();
        // $mes = $mes->format('m');

        $fechas=DB::table('fechas as f')
        ->join('precios as p', 'p.id_fecha', '=', 'f.id')
        ->join('indicadors as i', 'i.id', '=', 'p.indicador_id')
        ->selectRaw('count(*) as user_count')
        ->where('f.anio', '=', $id)
        // ->where('f.mes', '=', $mes)
        ->simplepaginate(15);

        return view ('informe.promediomeses', ['i'=>$i, 'fechas'=> $fechas,]);
    }
    public function vertodos()
    {
      $boletines=DB::table('boletins as b')
      ->select('b.*')
      ->get();
      return view('boletin.todos', ["boletines"=>$boletines]);
    }

    public function verpormes($mes)
    {
    
    $boletines=DB::table('boletins as b')
    ->select('b.*')
    ->where('b.mes', '=', $mes)
    ->get();
    return view('boletin.pormes', ["boletines"=>$boletines]);
    }

    public function comentarios(Request $request, $id)
    {

    $comentarios = DB::table('comentarios as c')
    ->join('noticias as n', 'c.noticias_id', '=', 'n.id')
    ->join('users as u', 'c.user_id', '=', 'u.id')
    ->select('c.*', 'n.titulo', 'u.name', 'u.email')
    ->where('c.estado', '=', $id)
        // ->where('n.id', '=',$id)
    ->orderBy('c.id', 'desc')
    ->paginate(20);

    $tipo=DB::table('comentarios as co')
    ->select('co.estado')
    ->where('co.estado', '=', $id)
    ->paginate(1);
    return view('comentarios.espera', ["comentarios"=>$comentarios, 'tipo'=>$tipo]);
    }
    public function indicadores(Request $request)
    {

    $indicadores=DB::table('indicadors as i')
    ->join('tipo__indicadors as t', 'i.indicador_id', '=', 't.id')
    ->select('i.*', 't.tipo')
    ->orderBy('i.nombre', 'asc')
    ->paginate(39);
    $tipo=Tipo_Indicador::all();
    $menu=Tipo_Indicador::all();
    return view ('indicador.listado', ["indicadores"=>$indicadores, 'tipo'=>$tipo, 'menu'=>$menu]);
    }

    public function indicadores_tipo(Request $request, $id)
    {

    $indicadores=DB::table('indicadors as i')
    ->join('tipo__indicadors as t', 'i.indicador_id', '=', 't.id')
    ->select('i.*', 't.tipo')
    ->where('t.tipo', '=', $id)
    ->orderBy('i.nombre', 'asc')
    ->paginate(39);
    $tipo=Tipo_Indicador::all();
    $menu=Tipo_Indicador::all();
    return view ('indicador.tipo', ["indicadores"=>$indicadores, 'tipo'=>$tipo, 'menu'=>$menu]);
    }
    public function promedios_meses(Request $request, $anio, $id)
    {
        // $promedio = DB::select('CALL promedioxmes(' . $id .');');
        $promedio = DB::select('CALL promedioxmes(' . $anio . ',' . $id . ');');
        // return $promedio;
        // return $promedio;
        $indicadores=DB::table('indicadors as i')
        ->select('i.*')
        ->orderBy('i.nombre', 'asc')
        ->get();
        $fechas=DB::table('fechas as f')
        ->select('f.anio', 'f.id')
        ->select(DB::raw('f.anio'))
        ->groupBy('f.anio')
        ->get();
        $anios = DB::table('fechas as f')
        ->select('f.anio as actual')
        ->where('f.anio', '=', $anio)
        ->paginate(1);

        $i = DB::table('indicadors as i')
        ->select('i.nombre', 'i.id')
        ->where('i.id', '=', $id)
        ->first();
        // return $anios;
        // return $promedio;
        return view ('graficos.promediomeses', ['promedio'=>$promedio, 'indicadores'=>$indicadores, 'fechas'=>$fechas, 'anios'=>$anios, 'i'=>$i]);
    }
    public function promedios_anios(Request $request, $anio1, $anio2, $id)
    {
        $promedio=DB::select('CALL promedioanios(' .$anio1 . ',' . $anio2 . ',' .$id . ');');

        return view('graficos.promedioanios', ['promedio'=>$promedio]); 
    }
}
