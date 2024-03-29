<?php

namespace App\Http\Controllers;

use App\Models\Acervo;
use App\Models\Empresa;
use App\Models\Tipo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{

    // Account Settings account
    public function account_settings_account()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Account Settings"], ['name' => "Account"]];
        return view('/content/pages/page-account-settings-account', ['breadcrumbs' => $breadcrumbs]);
    }

    // Account Settings security
    public function account_settings_security()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Account Settings"], ['name' => "Security"]];
        return view('/content/pages/page-account-settings-security', ['breadcrumbs' => $breadcrumbs]);
    }

    // Account Settings billing
    public function account_settings_billing()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Account Settings"], ['name' => "Billing & Plans"]];
        return view('/content/pages/page-account-settings-billing', ['breadcrumbs' => $breadcrumbs]);
    }

    // Account Settings notifications
    public function account_settings_notifications()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Account Settings"], ['name' => "Notifications"]];
        return view('/content/pages/page-account-settings-notifications', ['breadcrumbs' => $breadcrumbs]);
    }

    // Account Settings connections
    public function account_settings_connections()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Account Settings"], ['name' => "Connections"]];
        return view('/content/pages/page-account-settings-connections', ['breadcrumbs' => $breadcrumbs]);
    }

    // Profile
    public function profile()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Profile"]];

        return view('/content/pages/page-profile', ['breadcrumbs' => $breadcrumbs]);
    }

    // FAQ
    public function faq()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "FAQ"]];
        return view('/content/pages/page-faq', ['breadcrumbs' => $breadcrumbs]);
    }

    // Knowledge Base
    public function knowledge_base()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Knowledge Base"]];
        return view('/content/pages/page-knowledge-base', ['breadcrumbs' => $breadcrumbs]);
    }

    // Knowledge Base Category
    public function kb_category()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['link' => "/page/knowledge-base", 'name' => "Knowledge Base"], ['name' => "Category"]];
        return view('/content/pages/page-kb-category', ['breadcrumbs' => $breadcrumbs]);
    }

    // Knowledge Base Question
    public function kb_question()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['link' => "/page/knowledge-base", 'name' => "Knowledge Base"], ['link' => "/page/knowledge-base/category", 'name' => "Category"], ['name' => "Question"]];
        return view('/content/pages/page-kb-question', ['breadcrumbs' => $breadcrumbs]);
    }

    // pricing
    public function pricing()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('/content/pages/page-pricing', ['pageConfigs' => $pageConfigs]);
    }

    // api key
    public function api_key()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('/content/pages/page-api-key', ['pageConfigs' => $pageConfigs]);
    }

    // blog list
    public function blog_list()
    {
        $pageConfigs = ['contentLayout' => 'content-detached-right-sidebar', 'bodyClass' => 'content-detached-right-sidebar'];

        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['link' => "javascript:void(0)", 'name' => "Blog"], ['name' => "List"]];

        return view('/content/pages/page-blog-list', ['breadcrumbs' => $breadcrumbs, 'pageConfigs' => $pageConfigs]);
    }

    // blog detail
    public function blog_detail()
    {
        $pageConfigs = ['contentLayout' => 'content-detached-right-sidebar', 'bodyClass' => 'content-detached-right-sidebar'];

        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['link' => "javascript:void(0)", 'name' => "Blog"], ['name' => "Detail"]];

        return view('/content/pages/page-blog-detail', ['breadcrumbs' => $breadcrumbs, 'pageConfigs' => $pageConfigs]);
    }

    // blog edit
    public function blog_edit()
    {

        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['link' => "javascript:void(0)", 'name' => "Blog"], ['name' => "Edit"]];

        return view('/content/pages/page-blog-edit', ['breadcrumbs' => $breadcrumbs]);
    }

    // modal examples
    public function modal_examples()
    {

        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['name' => "Modal Examples"]];

        return view('/content/pages/modal-examples', ['breadcrumbs' => $breadcrumbs]);
    }

        // home
        public function home(Request $request)
        {
    
            $breadcrumbs = [['link' => "/", 'name' => "Home"], ['name' => "home"]];
            $filtros = $request->except('_token');
            $empresas = Empresa::where('inativo', 2)->orderBy('nome')->get();
            $tipos = Tipo::where('inativo', 2)->orderBy('descricao')->get();

            $publicacoes = Acervo::where(function($query) use ($request){
                                        if(!empty($request->inicio))
                                        {
                                            $query->where('data', $request->inicio);
                                        }
                
                                        if(!empty($request->empresa_id))
                                        {
                                            $query->where('empresa_id', $request->empresa_id);        
                                        }

                                        if(!empty($request->cnpj))
                                        {
                                            $query->where('cnpj', $request->cnpj);        
                                        }

                                        if(!empty($request->tipo_id))
                                        {
                                            $query->where('tipo_id', $request->tipo_id);
                                        }
                                })
                                ->whereDate('data', '<=', Carbon::parse(now())->format("Y-m-d"))
                                ->where('inativo', 2)
                                ->orderByDesc('id')
                                ->simplePaginate();
            
            return view('home', compact(['breadcrumbs', 'publicacoes', 'filtros', 'empresas', 'tipos', ]));
        }

        public function detalhe($id, Request $request)
        {
    
            $breadcrumbs = [['link' => "/", 'name' => "Detalhe"], ['name' => "detalhe"]];
            $filtros = $request->except('_token');
            $empresa = Empresa::find($id);
            $tipos = Tipo::where('inativo', 2)->orderBy('descricao')->get();

            $publicacoes = Acervo::where(function($query) use ($request){
                                        if(!empty($request->inicio) && !empty($request->fim)) {
                                            $query->whereBetween('data', [$request->inicio, $request->fim]);
                                        }
                
                                        if(!empty($request->tipo_id))
                                        {
                                            $query->where('tipo_id', $request->tipo_id);
                                        }
                                })
                                ->whereDate('data', '<=', Carbon::parse(now())->format("Y-m-d"))
                                ->where('cnpj', $empresa->cnpj)
                                ->where('inativo', 2)
                                ->orderByDesc('id')
                                ->simplePaginate();
            
            return view('detalhe', compact(['breadcrumbs', 'empresa','publicacoes', 'filtros', 'tipos', ]));
        }

    // Outros metodos
    public function download_home($caminho)
    {
        $caminho = str_replace('_', '/', $caminho);
        return Storage::download($caminho);
    }


    // license
    public function license()
    {

        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "License"]];

        return view('/content/pages/page-license', ['breadcrumbs' => $breadcrumbs]);
    }
}
