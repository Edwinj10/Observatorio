<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
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
            $usuarios=DB::table('users as u')
            ->select('u.*')
            ->orderBy('u.id', 'desc')
            ->paginate(20);
            $query=trim($request->get('searchText'));
            return view('usuarios.index', ["searchText"=>$query, 'usuarios'=>$usuarios]);
        }
    }
    public function listall()
    {
        $usuarios=DB::table('users as u')
        ->select('u.*')
        ->orderBy('u.id', 'desc')
        ->paginate(10);
        return view ('usuarios.listar', ['usuarios'=>$usuarios]);
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
    public function store(UserRequest $request)
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

        // if ($request->ajax()) 
        // {
        
        //     $result=User::create($request->all());
        //     if ($result) 
        //     {
        //         return response()->ajax(['success'=>'true']);
        //     }
        //     else
        //     {
        //         return response()->ajax(['success'=>'false']);
        //     }
        // }

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
    public function update(UserEditRequest $request, $id)
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
        $usuario = User::find($id);
        $usuario->delete();
        Session::flash ('message', 'Eliminado Correctamente');
        return redirect::to('/usuarios');
    }
}
