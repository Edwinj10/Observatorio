<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Comentario;
use Session;
use Carbon\Carbon;
use DB;
use Auth;
use Cache;
use Image;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comentario=DB::table('comentarios as c')
        ->join('noticias as n', 'c.noticias_id', '=', 'n.id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->select('c.*', 'n.*', 'u.*')
        // ->where('n.id', '=',$id)
        ->orderBy('c.id', 'desc')
        ->paginate(10);
        return view('comentarios.index')->with('comentarios',$comentarios);
    }
    public function comment(Request $request, $id)
    {
        $comentario=DB::table('comentarios as c')
        ->join('noticias as n', 'c.noticias_id', '=', 'n.id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->select('c.*', 'n.*', 'u.*')
        ->where('n.id', '=',$id)
        ->orderBy('c.id', 'desc')
        ->paginate(10);
        return $comentario;
        return view('comentarios.listar')->with('comentarios',$comentarios);
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
        if ($request->ajax()) 
        {
        
            $result=Comentario::create($request->all());
            if ($result) 
            {
                return response()->ajax(['success'=>'true']);
            }
            else
            {
                return response()->ajax(['success'=>'false']);
            }
        }
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
