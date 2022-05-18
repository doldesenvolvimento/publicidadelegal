<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtros = $request->except('_token');
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Lista de Usuários"], ['name' => "Usuários"]];

        if(Auth::user()->tipo == 2)
        {
            $usuarios = User::where(function($query) use ($request){
                if(!empty($request->user_id))
                {
                    $query->where('id', $request->user_id);
                }

                if(!empty($request->tipo))
                {
                    $query->where('tipo', $request->tipo);
                }

                if(!empty($request->inativo))
                {
                    $query->where('inativo', $request->inativo);
                }
              })
              ->where('id', Auth::id())
              ->orderByDesc('id')
              ->paginate();
        }else
        {
            $usuarios = User::where(function($query) use ($request){
                if(!empty($request->user_id))
                {
                    $query->where('id', $request->user_id);
                }

                if(!empty($request->tipo))
                {
                    $query->where('tipo', $request->tipo);
                }

                if(!empty($request->inativo))
                {
                    $query->where('inativo', $request->inativo);
                }
              })
              ->orderByDesc('id')
              ->paginate();
        }

        return view('legal/admin/usuario/listar-usuario', compact(['breadcrumbs', 'usuarios', 'filtros', ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->tipo != 1)
        {
            return redirect()->route('logout');
        }
        
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Cadastrar Usuário"], ['name' => "Usuário"]];
        return view('/legal/admin/usuario/cadastrar-usuario', compact(['breadcrumbs', ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensagens = [
            'password.min' => 'A senha não pode ter menos de 6 caractéres!',
            'email.unique' => 'E-mail informado já existe!',
        ];

        $request->validate([
            'password' => 'min: 6',
            'email' => 'unique:users',
        ], $mensagens);
        
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->tipo = $request->tipo;
        $usuario->password = Hash::make($request->password);
        $usuario->criador = Auth::id();
        $usuario->modificador = Auth::id();
        $usuario->save();

        return redirect()->route('create-usuario')->with('success', config('legal.success'));
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
        if(Auth::user()->tipo != 1 && Auth::id() != $id)
        {
            return redirect()->route('logout');
        }
        
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Editar Usuário"], ['name' => "Usuário"]];
        $usuario = User::find($id);

        if(isset($usuario))
        {
            return view('/legal/admin/usuario/editar-usuario', compact(['breadcrumbs', 'usuario', ]));
        }
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
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->tipo = (!empty($request->tipo))?$request->tipo:$usuario->tipo;
        $usuario->password = (!empty($request->password))?Hash::make($request->password):$usuario->password;
        $usuario->inativo = (!empty($request->inativo))?$request->inativo:$usuario->inativo;
        $usuario->modificador = Auth::id();
        $usuario->save();

        return redirect()->route('edit-usuario', $id)->with('success', config('legal.success'));
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

        if(isset($usuario))
        {
            $usuario->delete();
        }

        return redirect()->route('index-usuario')->with('success', config('legal.success'));
    }
}
