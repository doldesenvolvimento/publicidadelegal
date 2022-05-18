<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Lista de Empresas"], ['name' => "Empresas"]];
        $filtros = $request->except('_token');

        $empresas = Empresa::where(function($query) use ($request){
                                if(!empty($request->empresa_id))
                                {
                                    $query->where('id', $request->empresa_id);
                                }

                                if(!empty($request->cnpj))
                                {
                                    $query->where('cnpj', $request->cnpj);
                                }

                                if(!empty($request->inativo))
                                {
                                    $query->where('inativo', $request->inativo);
                                }
                            })
                            ->orderByDesc('id')
                            ->paginate(2);
                            
        return view('legal/admin/empresa/listar-empresa', compact(['breadcrumbs', 'empresas', 'filtros', ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Cadastrar Empresa"], ['name' => "Empresa"]];
        return view('/legal/admin/empresa/cadastrar-empresa', compact(['breadcrumbs',]));
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
            'cnpj.cnpj' => 'CNPJ inválido!',
            'cnpj.unique' => 'CNPJ informado já existe!',
        ];

        $request->validate([
            'cnpj' => 'cnpj|unique:empresas',
        ], $mensagens);
        
        $empresa = new Empresa();
        $empresa->nome = $request->nome;
        $empresa->cnpj = $request->cnpj;
        $empresa->criador = Auth::id();
        $empresa->modificador = Auth::id();
        
        if($empresa->save())
        {
            return redirect()->route('create-empresa')->with('success', config('legal.success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Editar Empresa"], ['name' => "Empresa"]];
        $empresa = Empresa::find($id);

        if(isset($empresa))
        {
            return view('/legal/admin/empresa/editar-empresa', compact(['breadcrumbs', 'empresa', ]));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mensagens = [
            'cnpj.cnpj' => 'CNPJ inválido!',
        ];

        $request->validate([
            'cnpj' => 'cnpj',
        ], $mensagens);
        
        $empresa = Empresa::find($id);
        $empresa->nome = $request->nome;
        $empresa->cnpj = $request->cnpj;
        $empresa->inativo = $request->inativo;
        $empresa->modificador = Auth::id();
        
        if($empresa->save())
        {
            return redirect()->route('edit-empresa', $id)->with('success', config('legal.success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);

        if(isset($empresa))
        {
            $empresa->delete();
            return redirect()->route('index-empresa')->with('success', config('legal.success'));
        }
    }
}
