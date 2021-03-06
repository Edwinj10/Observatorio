<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UserEditRequest;
use DB;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use Carbon\Carbon;
use Cache;
use Image;
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

        // if ($request) 
        // {
        $usuarios=DB::table('users as u')
        ->select('u.*')
        ->orderBy('u.id', 'desc')
        ->paginate(2);

        $user=DB::table('users as us')      
        ->select(DB::raw('us.id', 'us.tipo'))
        ->select(DB::raw('us.tipo'))
        ->groupBy('us.tipo')
        ->get();
            // return $user;
            // $query=trim($request->get('searchText'));
        return view('usuarios.index', ['usuarios'=>$usuarios, 'user'=>$user]);
        // }
    }
    public function listall()
    {
        $usuarios=DB::table('users as u')
        ->select('u.*')
        ->orderBy('u.id', 'desc')
        ->paginate(20);
        return view ('usuarios.listar', ['usuarios'=>$usuarios]);
    }
    public function index2(Request $request, $id)
    {
     $usuarios=DB::table('users as u')
     ->select('u.*')
     ->where('u.tipo', '=', $id)
     ->orderBy('u.id', 'desc')
     ->paginate(20);

     $user=DB::table('users as us')      
     ->select(DB::raw('us.id', 'us.tipo'))
     ->select(DB::raw('us.tipo'))
     ->groupBy('us.tipo')
     ->get();

     return view('usuarios.index2', ['usuarios'=>$usuarios, 'user'=>$user]);
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
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'tipo' => $request['tipo'],
            'facebook' => $request['facebook'],
            'twiter' => $request['twiter'],
            'googleplus' => $request['googleplus'],
            'foto' => $request['foto'],

        ]);


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
    public function update(UserEditRequest $request, $id)
    {
        $usuarios = User::find($id);
        $usuarios->fill($request->all());
        $usuarios->save();
        Session::flash('message','Usuario Actualizado Correctamente');
        return Redirect::to('/usuarios');
        // $usuarios = User::findOrFail($id);
        // $usuarios->name=$request->get('name');
        
        // $usuarios->tipo=$request->get('tipo');
        // $usuarios->facebook=$request->get('facebook');
        // $usuarios->twiter=$request->get('twiter');
        // $usuarios->googleplus=$request->get('googleplus');

        // if (Input::hasFile('foto')) 
        //     {
        //         $file=Input::file('foto');
        //         $file->move(public_path().'/imagenes/usuarios/', $file->getClientOriginalName());
        //         $usuarios->foto=$file->getClientOriginalName();
        //     }

        //     $usuarios->update();

        //     return redirect('/usuarios')-> with('message','Actualizado Correctamente');

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
        $usuario_foto =public_path('imagenes/usuarios').'/'.$usuario->foto;
        unlink($usuario_foto);
        $usuario->delete();
        Session::flash ('message', 'Eliminado Correctamente');
        return redirect::to('/usuarios');
    }

    public function foto(UsuarioRequest $request, $id)
    {
        $p = User::findOrFail($id);
        $p->fill($request->all());
        $p->update();
        return back()->with('message', 'Foto Modificada Correctamente');
    }
}
