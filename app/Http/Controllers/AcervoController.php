<?php

namespace App\Http\Controllers;

use App\Models\Acervo;
use App\Models\Empresa;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AcervoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mensagens = [
            'inicio.required_with' => 'Por favor, informar data de Início!',
            'inicio.before_or_equal' => 'Data de Início não pode ser maior que a data de Fim!',
            'fim.required_with' => 'Por favor, informar Fim!',
            'fim.after_or_equal' => 'Data Fim não pode ser menor que data de Início!',
        ];

        $request->validate([
            'inicio' => 'nullable|required_with:fim|before_or_equal:fim',
            'fim' => 'nullable|required_with:inicio|after_or_equal:inicio',
        ], $mensagens);
        
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Lista de Publicações Legais"], ['name' => "Publicações"]];
        
        $filtros = $request->except('_token');
        $empresas = Empresa::where('inativo', 2)->orderBy('nome')->get();
        $tipos = Tipo::where('inativo', 2)->orderBy('descricao')->get();
        $publicacoes = Acervo::where(function($query) use ($request){
                                    if(!empty($request->inicio) && !empty($request->fim))
                                    {
                                        $query->where('data', '>=', $request->inicio)
                                              ->where('data', '<=', $request->fim);
                                    }
            
                                    if(!empty($request->empresa_id))
                                    {
                                        $query->where('empresa_id', $request->empresa_id);        
                                    }

                                    if(!empty($request->tipo_id))
                                    {
                                        $query->where('tipo_id', $request->tipo_id);
                                    }

                                    if(!empty($request->inativo))
                                    {
                                        $query->where('inativo', $request->inativo);
                                    }
                               })
                               ->orderByDesc('id')
                               ->simplePaginate();
        
        return view('legal/admin/publicacao/listar-publicacao', compact(['breadcrumbs', 'publicacoes', 'filtros', 'empresas', 'tipos', ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Cadastrar Publicação"], ['name' => "Publicação"]];
        $empresas = Empresa::where('inativo', 2)->orderBy('nome')->get();
        $tipos = Tipo::where('inativo', 2)->get();
        return view('/legal/admin/publicacao/cadastrar-publicacao', compact(['breadcrumbs','empresas', 'tipos',]));
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
            'data.required' => 'Campo Data é Obrigatório!',
            'empresa_id.required' => 'Campo Empresa é Obrigatório!',
            'tipo_id.required' => 'Campo Tipo é Obrigatório!',
            'anexo.required' => 'Campo Arquivo é Obrigatório!',
            'url.starts_with' => 'Url inválida!',
            'anexo.mimes' => 'Só é aceito Arquivo em formato PDF!',
        ];

        $request->validate([
            'data' => 'required',
            'empresa_id' => 'required',
            'tipo_id' => 'required',
            'url' => 'nullable|starts_with:https://dol.com.br/digital/',
            'anexo' => 'required|mimes:pdf',
        ], $mensagens);
        
        if(empty($request->data))
        {
            return redirect()->route('create-publicacao');
        }

        $empresa = Empresa::find($request->empresa_id);
        
        $publicacao = new Acervo();
        $publicacao->empresa_id = $request->empresa_id;
        $publicacao->cnpj = $empresa->cnpj;
        $publicacao->data = $request->data;
        $publicacao->tipo_id = $request->tipo_id;
        $publicacao->url = (!empty($request->url))?$request->url:null;
        $publicacao->anexo = $request->file('anexo')->store("public/assinatura/pdfs/{$publicacao->empresa->cnpj}");
        $publicacao->original = $request->file('anexo')->store("public/original/{$publicacao->empresa->cnpj}");
        $publicacao->criador = Auth::id();
        $publicacao->modificador = Auth::id();

        // assinando pdf
        $caminho = config('legal.caminho');
        include_once("$caminho/ee.php");

        Storage::delete($publicacao->anexo);

        $publicacao->anexo = "public/assinatura/pdfs/{$publicacao->empresa->cnpj}/$assinado";

        if($publicacao->save())
        {
            return redirect()->route('create-publicacao')->with('success', config('legal.success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acervo  $acervo
     * @return \Illuminate\Http\Response
     */
    public function show(Acervo $acervo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acervo  $acervo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Editar Publicação"], ['name' => "Publicação"]];
        $publicacao = Acervo::find($id);

        if(isset($publicacao))
        {
            $empresas = Empresa::where('inativo', 2)->orderBy('nome')->get();
            $tipos = Tipo::where('inativo', 2)->orderBy('descricao')->get();

            return view('/legal/admin/publicacao/editar-publicacao', compact(['breadcrumbs', 'publicacao', 'empresas', 'tipos', ]));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acervo  $acervo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mensagens = [
            'anexo.mimes' => 'Só é aceito arquivo em formato PDF!',
        ];

        $request->validate([
            'anexo' => 'mimes:pdf',
        ], $mensagens);

        $empresa = Empresa::find($request->empresa_id);

        $publicacao = Acervo::find($id);
        $publicacao->empresa_id = $request->empresa_id;
        $publicacao->cnpj = $empresa->cnpj;
        $publicacao->data = $request->data;
        $publicacao->tipo_id = $request->tipo_id;
        $publicacao->url = (!empty($request->url))?$request->url:null;
        $publicacao->inativo = $request->inativo;
        $publicacao->modificador = Auth::id();

        if($request->hasFile('anexo'))
        {
            Storage::delete($publicacao->anexo);
            Storage::delete($publicacao->original);
            $publicacao->anexo = $request->file('anexo')->store("public/assinatura/pdfs/{$publicacao->empresa->cnpj}");
            $publicacao->original = $request->file('anexo')->store("public/original/{$publicacao->empresa->cnpj}");
        }

        // assinando pdf
        $caminho = config('legal.caminho');
        include_once("$caminho/ee.php");

        Storage::delete($publicacao->anexo);

        $publicacao->anexo = "public/assinatura/pdfs/{$publicacao->empresa->cnpj}/$assinado";
        

        if($publicacao->save())
        {
            return redirect()->route('edit-publicacao', $id)->with('success', config('legal.success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acervo  $acervo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicacao = Acervo::find($id);

        if(isset($publicacao))
        {
            Storage::delete($publicacao->anexo);

            if($publicacao->delete())
            {
                return redirect()->route('index-publicacao')->with('success', config('legal.success'));
            }
        }
    }

    // Outros metodos
    public function download($caminho)
    {
        $caminho = str_replace('_', '/', $caminho);
        return Storage::download($caminho);
    }
}
