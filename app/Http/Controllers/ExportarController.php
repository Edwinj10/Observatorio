<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
use Excel;
use DB;

class ExportarController extends Controller
{
    public function indicadores($id)
    {
    	
    	Excel::create('Indicadores', function($excel) use ($id) {
		$excel->sheet('Datos', function($sheet) use ($id) {
			// header
			$sheet->mergeCells('A1:D1');
			$sheet->row(1, ['Datos del Indicador'.$id]);
			$sheet->row(2, ['Codigo', 'Nombre', 'Importante', 'Institucion', 'Descripcion']);
			// data

		$i=DB::table('indicadors as i')
            ->select('i.*')
            ->where('i.id', '=', $id)
            ->get();
		
		foreach ($i as $pro) {
			$row= [];
			$row[0]= $pro->id;
			$row[1]= $pro->nombre;
			$row[2]= $pro->importante;
			$row[3]= $pro->institucion_id;
			$row[4]= $pro->descripcion;
			$sheet->appendRow($row);
			
		}       

    	});


		})->export('xls');

    }
    public function indicadores_precios($id)
    {
    	
       Excel::create('Indicadores', function($excel) use ($id) {
		$excel->sheet('Datos', function($sheet) use ($id) {
			// header
			$sheet->mergeCells('A1:D1');
			$sheet->row(1, ['Precios de Indicadores segun la fecha'.$id]);
			$sheet->row(2, ['Codigo', 'Nombre', 'Descripcion', 'Institucion', 'Dia', 'Mes', 'Año', 'Precio']);
			// data

		 $fechas=DB::table('fechas as f')
        ->join('precios as p', 'p.id_fecha', '=', 'f.id')
        ->join('indicadors as i', 'i.id', '=', 'p.indicador_id')
        ->join('institucions as inst', 'inst.id', '=', 'i.id')
        ->select('f.*', 'p.*', 'i.id as indi', 'i.nombre', 'i.descripcion', 'inst.nombres')
        ->where('p.indicador_id', '=', $id)
        // ->where('f.mes', '=', $mes)
        ->get();
        
		foreach ($fechas as $pro) {
			$row= [];
			$row[0]= $pro->indi;
			$row[1]= $pro->nombre;
			$row[2]= $pro->descripcion;
			$row[3]= $pro->nombres;
			$row[4]= $pro->dia;
			$row[5]= $pro->mes;
			$row[6]= $pro->anio;
			$row[7]= $pro->precio;
			$sheet->appendRow($row);
			
		}       

    	});


		})->export('xls');
        
    }
}
