<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use Carbon\Carbon;
use Cache;
class USController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // para los midelware
       
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['create', 'destroy', 'edit', 'index']]);
    }

    public function index(Request $request)
    {
             
        if ($request) 
        {

            $query=trim($request->get('searchText'));

            $usuarios=DB::table('users as u')
            ->select('u.*')
           
            ->orderBy('u.id', 'desc')
            ->paginate(10);

            return view('usuarios.index', ["usuarios"=>$usuarios, "searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('usuarios/create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios = new User;
        $usuarios->name=$request->get('name');
        $usuarios->email=$request->get('email');

        $usuarios->password=bcrypt($request["password"]);
        $usuarios->tipo=$request->get('tipo');
        $usuarios->facebook=$request->get('facebook');
        $usuarios->twiter=$request->get('twiter');
        $usuarios->googleplus=$request->get('googleplus');

        if (Input::hasFile('foto')) 
        {
           
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/usuarios/', $file->getClientOriginalName());
            $usuarios->foto=$file->getClientOriginalName();

        }

        $usuarios->save();

        return redirect('/usuarios')-> with('massage','Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios =User::find($id);
        return view("usuarios.show",array('usuarios' =>$usuarios));
        return $usuarios;
     
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
        $usuarios = User::findOrFail($id);
        $usuarios->name=$request->get('name');
        $usuarios->email=$request->get('email');

        $usuarios->tipo=$request->get('tipo');
        $usuarios->facebook=$request->get('facebook');
            $usuarios->twiter=$request->get('twiter');
              $usuarios->googleplus=$request->get('googleplus');

        if (Input::hasFile('foto')) 
        {
           
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/usuarios/', $file->getClientOriginalName());
            $usuarios->foto=$file->getClientOriginalName();

        }

        $usuarios->update();

        return redirect('/usuarios')-> with('massage','Actualizado');

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
