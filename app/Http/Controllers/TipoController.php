<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Lista de Tipos"], ['name' => "Tipos"]];
        $filtros = $request->except('_token');

        $tipos = Tipo::where(function($query) use ($request){
                            if(!empty($request->descricao))
                            {
                                $query->where('descricao', 'like', "%$request->descricao%");        
                            }

                            if(!empty($request->inativo))
                            {
                                $query->where('inativo', $request->inativo);
                            }
                       })
                       ->orderBy('id')
                       ->paginate();
                       
        return view('legal/admin/tipo/listar-tipo', compact(['breadcrumbs', 'tipos', 'filtros', ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Cadastrar Tipo"], ['name' => "Tipo"]];
        return view('/legal/admin/tipo/cadastrar-tipo', compact(['breadcrumbs',]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = new Tipo();
        $tipo->descricao = $request->descricao;
        $tipo->criador = Auth::id();
        $tipo->modificador = Auth::id();
        
        if($tipo->save())
        {
            return redirect()->route('create-tipo')->with('success', config('legal.success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Editar Tipo"], ['name' => "Tipo"]];
        $tipo = Tipo::find($id);

        if(isset($tipo))
        {
            return view('/legal/admin/tipo/editar-tipo', compact(['breadcrumbs', 'tipo', ]));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipo = Tipo::find($id);
        $tipo->descricao = $request->descricao;
        $tipo->inativo = $request->inativo;
        $tipo->modificador = Auth::id();
        
        if($tipo->save())
        {
            return redirect()->route('edit-tipo', $id)->with('success', config('legal.success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = Tipo::find($id);

        if(isset($tipo))
        {
            $tipo->delete();
            return redirect()->route('index-tipo')->with('success', config('legal.success'));
        }
    }
}
