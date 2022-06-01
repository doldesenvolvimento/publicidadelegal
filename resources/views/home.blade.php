@extends('layouts/fullLayoutMaster')

@section('title', $breadcrumbs[1]['name'])

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper">
      <div class="content-body">

        
        <link rel="stylesheet" href="/public/css/core.css">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="Diário do Pará">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="Diário do Pará">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="theme-color" content="#000000">
<meta name="msapplication-TileColor" content="#000000">

 <!-- cabeçalho navbar-->
<header>
    <nav class="navbar fixed-top navbar-dark">
        <div class="container-sm">
          
          <div class="row d-none d-lg-flex">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"><g transform="translate(-55 -5)"><circle cx="20" cy="20" r="20" transform="translate(55 5)" fill="#fff" opacity="0.197"/>Início<g transform="translate(-43.041 -323.607)"><path d="M118.125,358.759c-1.744,0-3.488.007-5.232,0a3.785,3.785,0,0,1-3.778-3.109,4.316,4.316,0,0,1-.069-.827c0-2.646,0-5.292,0-7.938a3.95,3.95,0,0,1,1.317-3.035c1.916-1.781,3.814-3.581,5.724-5.369a2.864,2.864,0,0,1,4.13.015q2.861,2.686,5.722,5.372a3.911,3.911,0,0,1,1.295,2.985c0,2.666,0,5.331,0,8a3.8,3.8,0,0,1-3.928,3.911h-5.173Zm-.011-1.9c1.724,0,3.448.005,5.171,0a1.865,1.865,0,0,0,1.971-1.979q0-4.042,0-8.084a2.007,2.007,0,0,0-.66-1.533q-2.835-2.668-5.67-5.337a1.042,1.042,0,0,0-1.639.007q-2.815,2.646-5.628,5.294a2.106,2.106,0,0,0-.7,1.635c.011,2.655,0,5.31,0,7.965A1.865,1.865,0,0,0,113,356.855C114.706,356.86,116.41,356.856,118.114,356.856Z" transform="translate(0 0)" fill="#fff"/><path d="M172.806,614.9h-10a.951.951,0,1,1,0-1.9h10a.951.951,0,1,1,0,1.9Z" transform="translate(-49.669 -259.018)" fill="#fff"/></g></g></svg>
        </div>
          
        <img class="order-1 logo text-center img-fluid" src="{{ asset('/images/logo/logo_dpa.png') }}" width="200px" height="" alt="diário do Pará">
          
          <div class="order-2 row">
          <a href="https://dol.com.br/digital/" class="btn btn-secondary" role="button" aria-pressed="true">Edição Eletrônica</a>
        </div>
        </div>
      </nav>
</header>

<!-- principal -->
<body>
    <div class="container-sm">
<h1 class="publi"></h1>
</div>

<div class="container-sm">
  <!-- PESQUISA -->
<section id="advanced-search-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-bottom">
          <h1 class="">Publicações</h1>
          <p class="texto1">Acesse os balanços e os fatos relevantes que envolvem as principais empresas do País. Leia notícias de negócios, veja as cotações das moedas e os índices da bolsa.</p>

        </div>
        <!--FORMULARIO DE BUSCA -->
        <div class="card-body mt-2">
          <form action="{{ route('home') }}" class="dt_adv_search" method="POST">
            @csrf

            <div class="row g-1 mb-md-1">
              <div class="col-md-4">
                <label class="form-label">EMPRESA:</label>
                <select class="select2 form-select" name="empresa_id" id="empresa_id">
                  <option value="">Selecione uma opção</option>

                    @if (isset($empresas))
                      @foreach($empresas as $empresa)
                        <option value="{{ $empresa->id }}"
                        @if (isset($filtros['empresa_id']) && $filtros['empresa_id'] == $empresa->id)
                          selected
                        @else
                          @if (old('empresa_id') && old('empresa_id') == $empresa->id)
                            selected
                          @endif
                        @endif
                        >{{ $empresa->nome }}</option>
                      @endforeach    
                    @endif

                </select>
              </div>
              <div class="col-md-3">
                <label class="form-label">CNPJ:</label>
                <input 
                  type="number" 
                  class="form-control" 
                  name="cnpj"
                  
                  @if (isset($filtros['cnpj']))
                    value = {{ $filtros['cnpj'] }}
                  @endif

                  @if (old('cnpj'))
                    value="{{ old('cnpj') }}"  
                  @endif
                                    
                  id="basicInput" 
                  placeholder="Informe CNPJ" 
                />
              </div>
              <div class="col-md-3">
                <label class="form-label">DATA DA PUBLICAÇÃO:</label>
                <input
                  type="date"
                  class="form-control dt-input"
                  name="inicio"

                  @if (isset($filtros['inicio']))
                    value = {{ $filtros['inicio'] }}
                  @endif

                  @if (old('inicio'))
                    value="{{ old('inicio') }}"  
                  @endif

                  data-column="3"
                  placeholder="Web designer"
                  data-column-index="2"
                />
              </div>
              <div class="col-md-2">
                <label class="form-label w-100">&nbsp;</label>
                <button class="btn btn-primary w-100" type="submit">Pesquisar</button>
              </div>
              </div>
             </div>
            </div>
          </form>
        </div>
</section>
<!--/ FORMULARIO -->
</div>

  <!-- tabela de publicacoes -->

  
  <div class="container-sm">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Empresa</th>
                  <th>CNPJ</th>
                  <th>TIPO</th>
                  <th>DATA</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                @if(isset($publicacoes[0]->id))
                  @foreach($publicacoes as $publicacao)
                    <tr>
                      <td>
                      <span class="fw-bold">{{ $publicacao->empresa->nome }}</span>
                      </td>
                      <td class="fw-bold">
                        {!! app(App\Http\Controllers\UtilController::class)->mask($publicacao->cnpj, '##.###.###/####-##') !!}
                      </td>
                      <td class="fw-bold">{{ $publicacao->tipo->descricao }}</td>
                      <td class="fw-bold">{{ \Carbon\Carbon::parse($publicacao->data)->format("d/m/Y") }}</td>
                      <td class="text-end">
                        <div class="text-nowrap btn-group" role="group" aria-label="Basic example">
                          <a href="{{ route('download-home', str_replace('/', '_', $publicacao->anexo)) }}" target="_blank" class="btn btn-outline-primary">
                            Baixar
                          </a>

                          @if(!empty($publicacao->url))
                            <a href="{{ $publicacao->url }}" class="btn btn-primary" target="_blank">Ver na Edição</a>
                          @endif

                        </div>
                      </td>
                    </tr>
                  @endforeach 
                @else 
                    <tr><td>Nenhum registro encontrado!</td></tr>
                @endif

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div>
      @if (!empty($filtros)) {{$publicacoes->appends($filtros)->links()}} @else {{$publicacoes->links()}} @endif
    </div>
  </div>

</body>


<!-- rodapé -->
<footer>
  <div class="container-sm">
  <div class="row">
  <div class="col-md text-center pb-2">
  <nav class="navbar navbar-expand-lg navbar-rodape pb-0 mb-0 ">
  <div class="navbar-collapse" id="navbarSupportedContent">
  
  <ul class="navbar-nav">
  <li>
  <a class="nav-link" href="https://dol.com.br/fale-conosco?d=1" title="FALE CONOSCO">FALE CONOSCO</a>
  </li>
  <li>
  <a class="nav-link" href="https://dol.com.br/central?d=1" title="CENTRAL DO ASSINANTE">CENTRAL DO ASSINANTE</a>
  </li>
  <li>
  <a class="nav-link" href="https://tem.diarioonline.com.br/?d=1" title="TEM!">TEM!</a>
  </li>
  <li>
  <a class="nav-link" href="https://dol.com.br/anuncie?d=1" title="ANUNCIE">ANUNCIE</a>
  </li>
  <li>
  <a class="nav-link" href="https://dol.com.br/privacidade?d=1" title="POLÍTICA DE PRIVACIDADE">POLÍTICA DE PRIVACIDADE</a>
  </li>
  <li>
  <a class="nav-link" href="https://dol.com.br/trabalhe?d=1" title="TRABALHE NO DOL">TRABALHE NO DOL</a>
  </li>
  <li>
  <a class="nav-link" href="https://dol.com.br/parceiros?d=1" title="PARCEIROS">PARCEIROS</a>
  </li>
  <li>
    <a class="nav-link-iti" href="https://verificador.iti.gov.br/" title="VALIDADOR" target="_blank">VALIDADOR (ITI)</a>
    </li>
  </ul>


  </div>
  </nav>
  </div>
  </div>
  </div>
  </div>
  
  <div class="mw-pad-t-50 mw-pad-b-50">
  <div class="container-sm">
  <div class="row text-center text-lg-start px-2">
    <div class="col-12 col-md-4">
      <div class="mw-m-b-30">
<div class="navbar-expand-lg navbar-rodape px-2 pb-2">
  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  viewBox="0 0 1366 409" style="enable-background:new 0 0 1366 409;" xml:space="preserve">
<style type="text/css">
 .st0{fill:#A5CD39;}
 .st1{fill-rule:evenodd;clip-rule:evenodd;fill:#1E64B4;}
 .st2{fill-rule:evenodd;clip-rule:evenodd;fill:#FF0000;}
 .st3{fill:#1E64B4;}
</style>
<g>
 <g>
   <g>
     <g>
       <g>
         <g>
           <path class="st0" d="M354.58,338.08c-39.06,39.6-94.24,64.3-154.64,64.3l-191.12,0V190.05C8.83,87.36,93.87,4.12,198.78,4.12
             h0c67.47,0,121.44,16.6,158.29,50.18C421.89,225.06,354.58,338.08,354.58,338.08z"/>
         </g>
       </g>
     </g>
   </g>
   <g>
     <g>
       <path class="st1" d="M360.61,56.75c-60.88-59.05-159.58-59.05-220.46,0c-12.93,12.54-32.16,39.82-36.73,56.38l-72.7,263.61
         l270.35-70.04c15.51-4.02,46.6-23.56,59.53-36.1C421.49,211.55,421.49,115.81,360.61,56.75z"/>
     </g>
   </g>
   <g>
     <path class="st2" d="M371.92,185.16c-36.45-61.08-117.04-81.93-180-46.57c-13.37,7.51-35.2,25.72-42.65,38.27L30.73,376.75
       l236.47-0.08c13.57,0,43.34-9.4,56.71-16.9C386.87,324.41,408.37,246.24,371.92,185.16z"/>
   </g>
 </g>
 <g>
   <path class="st3" d="M495.75,62.59c0.29-1.54,0.58-3.08,0.86-4.62c1.95-10.71,8.17-16.64,19.23-18.09
     c3.63-0.48,7.31-0.76,10.97-0.77c29.52-0.06,59.04-0.11,88.56-0.01c23.39,0.08,46.34,3.04,68.22,11.82
     c34.75,13.96,57.76,39.31,70.91,73.98c7.16,18.88,10.73,38.53,11.99,58.65c1.77,28.26,0.26,56.25-6.8,83.77
     c-6.6,25.7-17.96,48.8-37.68,67.16c-15.78,14.69-34.53,23.7-55.3,28.78c-14.69,3.59-29.63,5.1-44.72,5.14
     c-32.21,0.07-64.43,0.07-96.64-0.04c-4.25-0.01-8.57-0.5-12.73-1.37c-9.96-2.07-14.84-7.68-16.12-17.83
     c-0.15-1.19-0.49-2.35-0.74-3.52C495.75,251.3,495.75,156.95,495.75,62.59z M584.28,291.94c13.38-0.74,26.67-0.45,39.63-2.43
     c22.52-3.43,37.87-16.47,45.56-38.19c4.33-12.23,5.97-24.89,6.67-37.76c0.96-17.57,0.35-35.01-4.11-52.11
     c-5.1-19.53-16.07-34.42-35.76-40.98c-8.12-2.71-16.87-4-25.44-4.79c-8.71-0.8-17.55-0.18-26.55-0.18
     C584.28,174.14,584.28,232.51,584.28,291.94z"/>
   <path class="st3" d="M789.47,208.7c0.32-34.99,4.16-65.88,17.25-95c18.5-41.14,49.81-66.76,93.97-75.94
     c30.92-6.43,61.79-5.36,92.09,4.06c37.68,11.71,63.42,36.59,78.76,72.57c7.97,18.69,12.15,38.34,14.23,58.51
     c1.94,18.83,2.01,37.67,0.57,56.49c-2.04,26.49-7.18,52.26-19.46,76.17c-16.92,32.94-43.92,53.08-79.46,62.1
     c-24.32,6.17-49.02,7.25-73.95,4.61c-20.28-2.15-39.59-7.35-57.37-17.55c-23.63-13.54-39.82-33.59-50.42-58.37
     c-8.83-20.65-13.21-42.38-14.88-64.69C790.15,222.88,789.78,214.07,789.47,208.7z M993.96,201.06
     c-0.57-6.64-1.17-17.64-2.56-28.55c-1.58-12.41-4.94-24.35-10.86-35.53c-15.13-28.53-56.41-31.96-75.21-9.47
     c-4.87,5.82-8.92,12.61-12.09,19.53c-6.07,13.24-8.36,27.5-9.18,42c-1.22,21.62-0.31,43.09,5.47,64.06
     c6.23,22.58,19.1,38.4,44.14,40.78c15.72,1.49,29.65-2.2,40.52-14.38c5.28-5.92,8.84-12.86,11.55-20.27
     C992.09,241.83,993.46,223.71,993.96,201.06z"/>
   <path class="st3" d="M1204.01,264.39c0.01,4.26,0.25,8.59,1.05,12.76c1.8,9.4,8.74,14.69,18.28,15.49
     c4.63,0.39,9.29,0.62,13.94,0.63c35.29,0.05,75.14,0.02,110.43,0.03c9.89,0,11.26,1.35,11.28,11.17c0.03,17.52,0.03,35.04,0,52.56
     c-0.01,8.72-2.72,11.39-11.44,11.39c-45.46,0-95.48,0.06-140.93-0.03c-16.9-0.03-33.45-2.29-48.86-9.76
     c-21.23-10.29-33.61-27.7-38.4-50.33c-2.11-9.97-3.88-20.35-3.99-30.56l0.13-227.52c0-1.82,0.19-3.66,0.55-5.44
     c0.69-3.42,3.03-5.23,6.36-5.7c2.3-0.32,4.64-0.46,6.96-0.47c20.46-0.03,40.14-0.02,60.6-0.02c1.35,0,2.7,0.01,4.04,0.1
     c8.88,0.58,10,1.67,10.02,10.66V264.39z"/>
 </g>
</g>
</svg>

</div>
<div class="navbar-expand-lg navbar-rodape">
      <a class="whats" href="https://api.whatsapp.com/send?phone=5591984126477" target="_blank" rel="external noopener nofollow" title="Whatsapp">
      <span class="text-nowrap dol-f-38 dol-c-green mw-flex mw-a-items-center"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNjQiIGhlaWdodD0iNjQiCnZpZXdCb3g9IjAgMCAxNzIgMTcyIgpzdHlsZT0iIGZpbGw6IzAwMDAwMDsiPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0ibm9uZSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lY2FwPSJidXR0IiBzdHJva2UtbGluZWpvaW49Im1pdGVyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1kYXNoYXJyYXk9IiIgc3Ryb2tlLWRhc2hvZmZzZXQ9IjAiIGZvbnQtZmFtaWx5PSJub25lIiBmb250LXdlaWdodD0ibm9uZSIgZm9udC1zaXplPSJub25lIiB0ZXh0LWFuY2hvcj0ibm9uZSIgc3R5bGU9Im1peC1ibGVuZC1tb2RlOiBub3JtYWwiPjxwYXRoIGQ9Ik0wLDE3MnYtMTcyaDE3MnYxNzJ6IiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iPjwvcGF0aD48ZyBmaWxsPSIjMDA2MjMwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0xMzEuNzA4NDksNDAuMzMzNDljLTEyLjEzNTc0LC0xMi4xMzU3NCAtMjguMjYwNzQsLTE4LjgzMzQ5IC00NS40MzU1NSwtMTguODMzNDljLTM1LjM5OTQxLDAgLTY0LjIyNzA1LDI4LjgwNjY0IC02NC4yMjcwNSw2NC4yMDYwNmMtMC4wMjEsMTEuMzE2ODkgMi45Mzk0NSwyMi4zNjA4NCA4LjU2NjQxLDMyLjEwMzAzbC05LjExMjMxLDMzLjI3ODgxbDM0LjA1NTY3LC04Ljk0NDMzYzkuMzY0MjYsNS4xMjMwNSAxOS45NDYyOSw3LjgxMDU1IDMwLjY5NjI5LDcuODMxNTRoMC4wMjA5OWMzNS4zOTk0MiwwIDY0LjIwNjA2LC0yOC44MDY2NCA2NC4yMjcwNSwtNjQuMjI3MDVjMCwtMTcuMTUzODEgLTYuNjc2NzYsLTMzLjI3ODgxIC0xOC43OTE1MSwtNDUuNDE0NTV6TTg2LjI3Mjk1LDEzOS4xMjAxMmgtMC4wMjA5OWMtOS41NzQyMiwwIC0xOC45ODA0NywtMi41ODI1MiAtMjcuMTY4OTQsLTcuNDMyNjJsLTEuOTUyNjQsLTEuMTU0NzlsLTIwLjIxOTIzLDUuMjkxMDJsNS4zOTU5OSwtMTkuNjk0MzNsLTEuMjU5NzcsLTIuMDE1NjJjLTUuMzU0MDEsLTguNTAzNDIgLTguMTY3NDgsLTE4LjMyOTU5IC04LjE2NzQ4LC0yOC40MDc3MWMwLC0yOS40MTU1MyAyMy45NTY1NCwtNTMuMzUxMDggNTMuNDE0MDYsLTUzLjM1MTA4YzE0LjI1NjM0LDAgMjcuNjUxODUsNS41NjM5NyAzNy43Mjk5OCwxNS42NDIwOWMxMC4wNzgxMywxMC4wOTkxMiAxNS42MjEwOSwyMy40OTQ2MiAxNS42MjEwOSwzNy43NTA5N2MwLDI5LjQzNjUzIC0yMy45NTY1NCw1My4zNzIwNyAtNTMuMzcyMDcsNTMuMzcyMDd6TTExNS41NDE1MSw5OS4xNDM1NmMtMS41OTU3LC0wLjc5Nzg1IC05LjQ5MDIzLC00LjY4MjEzIC0xMC45NTk5NiwtNS4yMDcwM2MtMS40Njk3MiwtMC41NDU5IC0yLjU0MDUzLC0wLjc5Nzg1IC0zLjYxMTMzLDAuNzk3ODVjLTEuMDcwOCwxLjYxNjcgLTQuMTM2MjMsNS4yMjgwMyAtNS4wODEwNSw2LjI5ODgzYy0wLjkyMzgzLDEuMDQ5ODEgLTEuODY4NjUsMS4xOTY3OCAtMy40NjQzNSwwLjM5ODkzYy0xLjYxNjcsLTAuNzk3ODUgLTYuNzgxNzQsLTIuNDk4NTQgLTEyLjkxMjYsLTcuOTc4NTJjLTQuNzY2MTEsLTQuMjQxMjEgLTcuOTk5NTEsLTkuNTExMjMgLTguOTIzMzQsLTExLjEwNjkzYy0wLjk0NDgzLC0xLjYxNjcgLTAuMTA0OTgsLTIuNDc3NTQgMC42OTI4NywtMy4yNzUzOWMwLjczNDg2LC0wLjcxMzg3IDEuNjE2NywtMS44Njg2NiAyLjQxNDU1LC0yLjgxMzQ4YzAuNzk3ODUsLTAuOTIzODMgMS4wNzA4LC0xLjU5NTcgMS42MTY3LC0yLjY2NjUxYzAuNTI0OSwtMS4wNzA4IDAuMjUxOTUsLTIuMDE1NjIgLTAuMTQ2OTcsLTIuODEzNDdjLTAuMzk4OTMsLTAuNzk3ODUgLTMuNjExMzMsLTguNzEzMzggLTQuOTU1MDgsLTExLjkyNTc4Yy0xLjMwMTc2LC0zLjEyODQyIC0yLjYyNDUxLC0yLjY4NzUgLTMuNjExMzMsLTIuNzUwNDljLTAuOTIzODMsLTAuMDQxOTkgLTEuOTk0NjMsLTAuMDQxOTkgLTMuMDY1NDMsLTAuMDQxOTljLTEuMDcwOCwwIC0yLjgxMzQ4LDAuMzk4OTIgLTQuMjgzMiwyLjAxNTYzYy0xLjQ2OTczLDEuNTk1NyAtNS42MDU5Niw1LjQ3OTk4IC01LjYwNTk2LDEzLjM3NDUxYzAsNy44OTQ1MyA1Ljc1MjkzLDE1LjUzNzExIDYuNTUwNzgsMTYuNjA3OTFjMC43OTc4NSwxLjA0OTggMTEuMzE2OSwxNy4yNTg3OSAyNy40MjA5LDI0LjIwODQ5YzMuODIxMjksMS42NTg2OSA2LjgwMjczLDIuNjQ1NTEgOS4xMzMzLDMuMzgwMzdjMy44NDIyOSwxLjIxNzc4IDcuMzQ4NjQsMS4wNDk4MSAxMC4xMjAxMiwwLjY1MDg4YzMuMDg2NDIsLTAuNDYxOTIgOS40OTAyMywtMy44ODQyOCAxMC44MzM5OCwtNy42NDI1OGMxLjMyMjc1LC0zLjczNzMxIDEuMzIyNzUsLTYuOTQ5NzEgMC45MjM4MywtNy42MjE1OGMtMC4zOTg5MywtMC42NzE4NyAtMS40Njk3MywtMS4wNzA4IC0zLjA4NjQzLC0xLjg4OTY1eiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+"/> <p>91 98412-6477</p></span>
      </a>
      <span class="hx-style-3 dol-f-16 dol-f-nunito-extra-light mw-pad-l-50">Faça sua denúncia pelo WhatsApp do Diário e apareça no DOL!</span>
      <div class="col mx-auto mt-1">
      <a class="redesocial1" href="https://twitter.com/doldiarioonline" target="_blank" rel="external noopener nofollow" title="Twitter"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNDgiIGhlaWdodD0iNDgiCnZpZXdCb3g9IjAgMCA0OCA0OCIKc3R5bGU9IiBmaWxsOiMwMDAwMDA7Ij48cGF0aCBmaWxsPSIjMDNhOWY0IiBkPSJNMjQgNEEyMCAyMCAwIDEgMCAyNCA0NEEyMCAyMCAwIDEgMCAyNCA0WiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik0zNiwxNy4xMmMtMC44ODIsMC4zOTEtMS45OTksMC43NTgtMywwLjg4YzEuMDE4LTAuNjA0LDIuNjMzLTEuODYyLDMtMyBjLTAuOTUxLDAuNTU5LTIuNjcxLDEuMTU2LTMuNzkzLDEuMzcyQzMxLjMxMSwxNS40MjIsMzAuMDMzLDE1LDI4LjYxNywxNUMyNS44OTcsMTUsMjQsMTcuMzA1LDI0LDIwdjJjLTQsMC03LjktMy4wNDctMTAuMzI3LTYgYy0wLjQyNywwLjcyMS0wLjY2NywxLjU2NS0wLjY2NywyLjQ1N2MwLDEuODE5LDEuNjcxLDMuNjY1LDIuOTk0LDQuNTQzYy0wLjgwNy0wLjAyNS0yLjMzNS0wLjY0MS0zLTFjMCwwLjAxNiwwLDAuMDM2LDAsMC4wNTcgYzAsMi4zNjcsMS42NjEsMy45NzQsMy45MTIsNC40MjJDMTYuNTAxLDI2LjU5MiwxNiwyNywxNC4wNzIsMjdjMC42MjYsMS45MzUsMy43NzMsMi45NTgsNS45MjgsM2MtMS42ODYsMS4zMDctNC42OTIsMi03LDIgYy0wLjM5OSwwLTAuNjE1LDAuMDIyLTEtMC4wMjNDMTQuMTc4LDMzLjM1NywxNy4yMiwzNCwyMCwzNGM5LjA1NywwLDE0LTYuOTE4LDE0LTEzLjM3YzAtMC4yMTItMC4wMDctMC45MjItMC4wMTgtMS4xMyBDMzQuOTUsMTguODE4LDM1LjM0MiwxOC4xMDQsMzYsMTcuMTIiPjwvcGF0aD48L3N2Zz4="/></a>
      <a class="redesocial2" href="https://www.facebook.com/doldiarioonline" rel="external noopener nofollow" target="_blank" title="Facebook"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNDgiIGhlaWdodD0iNDgiCnZpZXdCb3g9IjAgMCAxNzIgMTcyIgpzdHlsZT0iIGZpbGw6IzAwMDAwMDsiPjxkZWZzPjxsaW5lYXJHcmFkaWVudCB4MT0iMzUuODA4MjUiIHkxPSIzNS44MDgyNSIgeDI9IjE0NS41MzcwOCIgeTI9IjE0NS41MzcwOCIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIGlkPSJjb2xvci0xX3VMV1Y1QTl2WElQdV9ncjEiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iIzNhNTk5NyI+PC9zdG9wPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzNhNTk5NyI+PC9zdG9wPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0ibm9uemVybyIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lY2FwPSJidXR0IiBzdHJva2UtbGluZWpvaW49Im1pdGVyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1kYXNoYXJyYXk9IiIgc3Ryb2tlLWRhc2hvZmZzZXQ9IjAiIGZvbnQtZmFtaWx5PSJub25lIiBmb250LXdlaWdodD0ibm9uZSIgZm9udC1zaXplPSJub25lIiB0ZXh0LWFuY2hvcj0ibm9uZSIgc3R5bGU9Im1peC1ibGVuZC1tb2RlOiBub3JtYWwiPjxwYXRoIGQ9Ik0wLDE3MnYtMTcyaDE3MnYxNzJ6IiBmaWxsPSJub25lIj48L3BhdGg+PGc+PHBhdGggZD0iTTg2LDE0LjMzMzMzYy0zOS41ODE1LDAgLTcxLjY2NjY3LDMyLjA4NTE3IC03MS42NjY2Nyw3MS42NjY2N2MwLDM5LjU4MTUgMzIuMDg1MTcsNzEuNjY2NjcgNzEuNjY2NjcsNzEuNjY2NjdjMzkuNTgxNSwwIDcxLjY2NjY3LC0zMi4wODUxNyA3MS42NjY2NywtNzEuNjY2NjdjMCwtMzkuNTgxNSAtMzIuMDg1MTcsLTcxLjY2NjY3IC03MS42NjY2NywtNzEuNjY2Njd6IiBmaWxsPSJ1cmwoI2NvbG9yLTFfdUxXVjVBOXZYSVB1X2dyMSkiPjwvcGF0aD48cGF0aCBkPSJNOTUuNzAwMDgsMTA0Ljk5NTI1aDE4LjU0NzMzbDIuOTEzMjUsLTE4Ljg0MTE3aC0yMS40NjA1OHYtMTAuMjk4NWMwLC03LjgyNiAyLjU1ODUsLTE0Ljc2NjkyIDkuODc5MjUsLTE0Ljc2NjkyaDExLjc2NDA4di0xNi40NDAzM2MtMi4wNjc1OCwtMC4yNzk1IC02LjQzOTI1LC0wLjg4ODY3IC0xNC42OTg4MywtMC44ODg2N2MtMTcuMjUwMTcsMCAtMjcuMzYyMzMsOS4xMDg4MyAtMjcuMzYyMzMsMjkuODYzNXYxMi41MzQ1aC0xNy43MzM5MnYxOC44NDExN2gxNy43MzAzM3Y1MS43ODYzM2MzLjUxMTY3LDAuNTIzMTcgNy4wNjk5MiwwLjg4MTUgMTAuNzIxMzMsMC44ODE1YzMuMzAwMjUsMCA2LjUyMTY3LC0wLjMwMSA5LjcwMDA4LC0wLjczMXoiIGZpbGw9IiNmZmZmZmYiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg=="/></a>
      <a class="redesocial3" href="https://www.instagram.com/doloficial/" rel="external noopener nofollow" target="_blank" title="Instagram"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNDEiIGhlaWdodD0iNDEiCnZpZXdCb3g9IjAgMCAxNzIgMTcyIgpzdHlsZT0iIGZpbGw6IzAwMDAwMDsiPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0ibm9uemVybyIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lY2FwPSJidXR0IiBzdHJva2UtbGluZWpvaW49Im1pdGVyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1kYXNoYXJyYXk9IiIgc3Ryb2tlLWRhc2hvZmZzZXQ9IjAiIGZvbnQtZmFtaWx5PSJub25lIiBmb250LXdlaWdodD0ibm9uZSIgZm9udC1zaXplPSJub25lIiB0ZXh0LWFuY2hvcj0ibm9uZSIgc3R5bGU9Im1peC1ibGVuZC1tb2RlOiBub3JtYWwiPjxwYXRoIGQ9Ik0wLDE3MnYtMTcyaDE3MnYxNzJ6IiBmaWxsPSJub25lIj48L3BhdGg+PHBhdGggZD0iTTg2LDE3MmMtNDcuNDk2NDksMCAtODYsLTM4LjUwMzUxIC04NiwtODZ2MGMwLC00Ny40OTY0OSAzOC41MDM1MSwtODYgODYsLTg2djBjNDcuNDk2NDksMCA4NiwzOC41MDM1MSA4Niw4NnYwYzAsNDcuNDk2NDkgLTM4LjUwMzUxLDg2IC04Niw4NnoiIGZpbGw9IiNjMjU2MDAiPjwvcGF0aD48ZyBmaWxsPSIjZmZmZmZmIj48cGF0aCBkPSJNNjUuMzA2MjUsMzMuNTc1ODNjLTE3LjQ3NTQ5LDAgLTMxLjczMDQyLDE0LjI1NDkzIC0zMS43MzA0MiwzMS43MzA0MnY0MS4zODc1YzAsMTcuNDczMTMgMTQuMjU0NDMsMzEuNzMwNDIgMzEuNzMwNDIsMzEuNzMwNDJoNDEuMzg3NWMxNy40NzM2MywwIDMxLjczMDQyLC0xNC4yNTY3OSAzMS43MzA0MiwtMzEuNzMwNDJ2LTQxLjM4NzVjMCwtMTcuNDc1OTkgLTE0LjI1NzI4LC0zMS43MzA0MiAtMzEuNzMwNDIsLTMxLjczMDQyek02NS4zMDYyNSw0MS44NTMzM2g0MS4zODc1YzEyLjk5OTEsMCAyMy40NTI5MiwxMC40NTExNSAyMy40NTI5MiwyMy40NTI5MnY0MS4zODc1YzAsMTIuOTk4NjEgLTEwLjQ1NDMxLDIzLjQ1MjkyIC0yMy40NTI5MiwyMy40NTI5MmgtNDEuMzg3NWMtMTMuMDAxNzcsMCAtMjMuNDUyOTIsLTEwLjQ1MzgxIC0yMy40NTI5MiwtMjMuNDUyOTJ2LTQxLjM4NzVjMCwtMTMuMDAyMjcgMTAuNDUwNjUsLTIzLjQ1MjkyIDIzLjQ1MjkyLC0yMy40NTI5MnpNMTEzLjU5MTY3LDUyLjg5Yy0zLjA0ODg4LDAgLTUuNTE4MzMsMi40Njk0NSAtNS41MTgzMyw1LjUxODMzYzAsMy4wNDg4OCAyLjQ2OTQ1LDUuNTE4MzMgNS41MTgzMyw1LjUxODMzYzMuMDQ4ODgsMCA1LjUxODMzLC0yLjQ2OTQ1IDUuNTE4MzMsLTUuNTE4MzNjMCwtMy4wNDg4OCAtMi40Njk0NSwtNS41MTgzMyAtNS41MTgzMywtNS41MTgzM3pNODYsNTguNDA4MzNjLTE1LjE4ODcyLDAgLTI3LjU5MTY3LDEyLjQwMjk1IC0yNy41OTE2NywyNy41OTE2N2MwLDE1LjE4ODcyIDEyLjQwMjk1LDI3LjU5MTY3IDI3LjU5MTY3LDI3LjU5MTY3YzE1LjE4ODcyLDAgMjcuNTkxNjcsLTEyLjQwMjk1IDI3LjU5MTY3LC0yNy41OTE2N2MwLC0xNS4xODg3MiAtMTIuNDAyOTUsLTI3LjU5MTY3IC0yNy41OTE2NywtMjcuNTkxNjd6TTg2LDY2LjY4NTgzYzEwLjcxNDM0LDAgMTkuMzE0MTcsOC41OTk4MyAxOS4zMTQxNywxOS4zMTQxN2MwLDEwLjcxNDM0IC04LjU5OTgzLDE5LjMxNDE3IC0xOS4zMTQxNywxOS4zMTQxN2MtMTAuNzE0MzQsMCAtMTkuMzE0MTcsLTguNTk5ODMgLTE5LjMxNDE3LC0xOS4zMTQxN2MwLC0xMC43MTQzNCA4LjU5OTgzLC0xOS4zMTQxNyAxOS4zMTQxNywtMTkuMzE0MTd6Ij48L3BhdGg+PC9nPjwvZz48L3N2Zz4="/></a>
      <a class="redesocial4" href="https://www.youtube.com/channel/UCIBUmFvG1ni6XisUqG7wr7g" rel="external noopener nofollow" target="_blank" title="YouTube"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNDEiIGhlaWdodD0iNDEiCnZpZXdCb3g9IjAgMCAxNzIgMTcyIgpzdHlsZT0iIGZpbGw6I3VuZGVmaW5lZDsiPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0ibm9uemVybyIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lY2FwPSJidXR0IiBzdHJva2UtbGluZWpvaW49Im1pdGVyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1kYXNoYXJyYXk9IiIgc3Ryb2tlLWRhc2hvZmZzZXQ9IjAiIGZvbnQtZmFtaWx5PSJub25lIiBmb250LXdlaWdodD0ibm9uZSIgZm9udC1zaXplPSJub25lIiB0ZXh0LWFuY2hvcj0ibm9uZSIgc3R5bGU9Im1peC1ibGVuZC1tb2RlOiBub3JtYWwiPjxwYXRoIGQ9Ik0wLDE3MnYtMTcyaDE3MnYxNzJ6IiBmaWxsPSJub25lIj48L3BhdGg+PHBhdGggZD0iTTg2LDE3MmMtNDcuNDk2NDksMCAtODYsLTM4LjUwMzUxIC04NiwtODZ2MGMwLC00Ny40OTY0OSAzOC41MDM1MSwtODYgODYsLTg2djBjNDcuNDk2NDksMCA4NiwzOC41MDM1MSA4Niw4NnYwYzAsNDcuNDk2NDkgLTM4LjUwMzUxLDg2IC04Niw4NnoiIGZpbGw9IiNlNzRjM2MiPjwvcGF0aD48ZyBmaWxsPSIjZmZmZmZmIj48cGF0aCBkPSJNMTM4LjM2MTY0LDU0LjIyODkxYy0xLjI1Njg1LC00LjY5OTU0IC00Ljk2MTg0LC04LjQwNDUzIC05LjY2MTM4LC05LjY2MTM4Yy04LjUyNDc1LC0yLjI4NDIgLTQyLjcwMDI1LC0yLjI4NDIgLTQyLjcwMDI1LC0yLjI4NDJjMCwwIC0zNC4xNzU1LDAgLTQyLjcwMDI1LDIuMjg0MmMtNC42OTk1NCwxLjI1Njg1IC04LjQwNDUzLDQuOTYxODQgLTkuNjYxMzgsOS42NjEzOGMtMi4yODQyLDguNTI0NzUgLTIuMjg0MiwzMS43NzEwOSAtMi4yODQyLDMxLjc3MTA5YzAsMCAwLDIzLjI0NjM0IDIuMjg0MiwzMS43NzEwOWMxLjI1Njg1LDQuNjk5NTQgNC45NjE4NCw4LjQwNDUzIDkuNjYxMzgsOS42NjEzOGM4LjUyNDc1LDIuMjg0MiA0Mi43MDAyNSwyLjI4NDIgNDIuNzAwMjUsMi4yODQyYzAsMCAzNC4xNzU1LDAgNDIuNzAwMjUsLTIuMjg0MmM0LjcwNTAxLC0xLjI1Njg1IDguNDA0NTMsLTQuOTYxODQgOS42NjEzOCwtOS42NjEzOGMyLjI4NDIsLTguNTI0NzUgMi4yODQyLC0zMS43NzEwOSAyLjI4NDIsLTMxLjc3MTA5YzAsMCAwLC0yMy4yNDYzNCAtMi4yODQyLC0zMS43NzEwOXpNNzUuMDcwODMsMTAwLjE5Njk5di0yOC4zOTM5OGMwLC0yLjEwMzg2IDIuMjc4NzMsLTMuNDE1MzYgNC4wOTg0NCwtMi4zNjYxNmwyNC41OTA2MiwxNC4xOTY5OWMxLjgxOTcxLDEuMDQ5MiAxLjgxOTcxLDMuNjgzMTMgMCw0LjczMjMzbC0yNC41OTA2MiwxNC4xOTY5OWMtMS44MTk3MSwxLjA1NDY2IC00LjA5ODQ0LC0wLjI2MjMgLTQuMDk4NDQsLTIuMzY2MTZ6Ij48L3BhdGg+PC9nPjwvZz48L3N2Zz4="/></a>
    </div>
      </div>
      </div>
      <hr>
      </div>
  <div class="col-12 col-md-8">
  
  <div class="row d-none d-lg-flex">
  <div class="col-md-3">
  <span class="hx-style-3 dol-c-noticias dol-f-14 mw-m-b-10">NOTÍCIAS</span>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/agropara?d=1" title="AGROPARÁ">AGROPARÁ</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/para?d=1" title="Notícias Pará">Notícias Pará</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/cirio?d=1" title="Círio">Círio</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/policia?d=1" title="Polícia">Polícia</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/brasil?d=1" title="Brasil">Brasil</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/eaibeleza?d=1" title="E aí, beleza?">E aí, beleza?</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/elas?d=1" title="Elas">Elas</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/auto-dicas?d=1" title="Veículos">Veículos</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/mundo-noticias?d=1" title="Mundo">Mundo</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/tecnologia?d=1" title="Tecnologia">Tecnologia</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/transito?d=1" title="Trânsito">Trânsito</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/gastronomia?d=1" title="Gastronomia">Gastronomia</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/papo-de-pet?d=1" title="Papo de PET">Papo de PET</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/babydol?d=1" title="Baby DOL">Baby DOL</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/te-cuida?d=1" title="Te Cuida">Te Cuida</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/santarem?d=1" title="Santarém">Santarém</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/carajas?d=1" title="DOL Carajás">DOL Carajás</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/politica?d=1" title="Política">Política</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/negocios?d=1" title="Negócios">Negócios</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/cursos--empregos?d=1" title="Cursos &amp; Empregos">Cursos &amp; Empregos</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/noticias/dol-delas?d=1" title="DOL Delas">DOL Delas</a>
  </div>
  <div class="col-md-3">
  <span class="hx-style-3 dol-c-esporte dol-f-14 mw-m-b-10">ESPORTE</span>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/esporte/esporte-para?d=1" title="Esporte Pará">Esporte Pará</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/esporte/esporte-brasil?d=1" title="Brasil">Brasil</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/esporte/mundo?d=1" title="Mundo">Mundo</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/colunistas/gerson-nogueira?d=1" title="Gerson Nogueira">Gerson Nogueira</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/esporte/remo?d=1" title="Remo">Remo</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/esporte/paysandu?d=1" title="Paysandu">Paysandu</a>
  </div>
  <div class="col-md-3">
  <span class="hx-style-3 dol-c-entretenimento dol-f-14 mw-m-b-10">ENTRETENIMENTO</span>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/cultura?d=1" title="Cultura">Cultura</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/cinema?d=1" title="Cinema">Cinema</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/fama?d=1" title="Fama">Fama</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/musica?d=1" title="Música">Música</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/games?d=1" title="Games">Games</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/carajas/entretenimento/promocoes?d=1" title="Promoções">Promoções</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/entretenimento/hqpop?d=1" title="HQPOP">HQPOP</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://todaon.com.br/?d=1" title="TodaON">TodaON</a>
  </div>
  <div class="col-md-3">
  <span class="hx-style-3 dol-c-dolplay dol-f-14 mw-m-b-10">OUTROS</span>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/galerias?d=1" title="Galerias">Galerias</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/dolplay?d=1" title="DOLPLAY">DOLPLAY</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://dol.com.br/digital?d=1" title="Ed. Eletrônica">Ed. Eletrônica</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="/concursos?d=1" title="Concursos">Concursos</a>
   <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://rbatv.dol.com.br/?d=1" title="RBATV">RBATV</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="http://radio99.com.br/?d=1" title="99FM">99FM</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="http://radiodiariofm.com.br/?d=1" title="Diário FM">Diário FM</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://radioclube.dol.com.br/?d=1" title="Rádio Clube">Rádio Clube</a>
  <a class="mw-fit-width mw-block dol-c-gray-3 dol-f-nunito-extra-light" href="https://tem.diarioonline.com.br/?d=1" title="Tem+">Tem+</a>
  </div>
  </div>
  </div>
  
 
  <div class="col-12 text-center">
  <small class="box-footer-lgpd dol-f-12">
  <span class="politica-privacidade">
  DOL-INTERMEDIACAO DE NEGOCIOS E PORTAL DE INTERNET LTDA - CNPJ 14.010.848/0001-06 - Rua Gaspar Viana, 773/7, Reduto - Belém/PA - CEP 66.053-090 <br>
  <a href="https://dol.com.br/privacidade" alt="Política de Privacidade" title="Política de Privacidade" class="dol-f-nunito-extra-bold">Política de Privacidade</a> - Para fazer qualquer solicitação ao nosso encarregado de proteção de dados <b>(DPO)</b>: <a href="mailto:lgpd@dol.com.br" alt="DPO" title="DPO" class="dol-f-nunito-extra-bold">lgpd@dol.com.br</a>.
  </span>
  </small>
  </div>
  </div>
  </div>
  </div>
  <div class="barra-rodape">
  <div class="container-fluid">
  <div class="row">
  <div class="col-md">
  <a href="https://dol.com.br/condicoes-gerais-uso" class="condicoes-de-uso" title="Condições gerais de uso">Condições gerais de uso | © Copyright 2010-2022 DOL - Diário Online</a> 
  </div>
  </div>
  </div>
  </div>
  </footer>


</div>
    </div>
  </div>

@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection
