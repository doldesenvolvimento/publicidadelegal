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
          <a href="https://dol.com.br/digital/" class="btn btn-danger" role="button" aria-pressed="true">Edição Eletrônica</a>
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
                  <th>Data</th>
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
                      <td>{{ $publicacao->empresa->cnpj }}</td>
                      <td>{{ \Carbon\Carbon::parse($publicacao->data)->format("d/m/Y") }}</td>
                      <td class="text-end">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ route('download-home', str_replace('/', '_', $publicacao->anexo)) }}" target="_blank" class="btn btn-outline-primary">
                            Baixar
                          </a>
                          <a href="{{ $publicacao->url }}" class="btn btn-primary" target="_blank">Ver na Edição</a>
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
  <div class="col-md">
  <nav class="navbar navbar-expand-lg navbar-rodape pb-0 mb-0 ">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
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
  <div class="row text-center text-lg-start">
    <div class="col-12 col-md-4">
      <div class="mw-m-b-30">
<div class="navbar navbar-expand-lg navbar-rodape pt-1 pb-1 mb-2">
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
      <a href="https://api.whatsapp.com/send?phone=5591984126477" target="_blank" rel="external noopener nofollow" title="Whatsapp">
      <span class="hx-style-2 dol-f-38 dol-c-green dol-f-nunito-extra-bold mw-flex mw-a-items-center"><img class="whatsapp" alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIKdmlld0JveD0iMCAwIDEwMCAxMDAiCnN0eWxlPSIgZmlsbDojMDAwMDAwOyI+PHBhdGggZD0iTTE1LjYxNyw5NS45OTljLTIuMDA2LDAtMy44ODctMC43ODUtNS4yOTgtMi4yMWMtMS44NjktMS45MDEtMi41OS00LjY2LTEuODkxLTcuMjExbDQuMzYzLTE1LjkzMiBjLTIuODM3LTUuODk0LTQuMzI3LTEyLjQxMi00LjMyMy0xOC45NzdDOC40NzgsMjcuNTksMjguMDc0LDgsNTIuMTUyLDhjMTEuNjgsMC4wMDQsMjIuNjUzLDQuNTUzLDMwLjkwMSwxMi44MDggYzguMjQ4LDguMjU2LDEyLjc4NywxOS4yMjgsMTIuNzgzLDMwLjg5NGMtMC4wMDksMjQuMDgtMTkuNjA2LDQzLjY3LTQzLjY4NCw0My42N2MtNi4yNDQtMC4wMDItMTIuNDc2LTEuMzYxLTE4LjE0My0zLjk0MyBsLTE2LjUwMSw0LjMyNkMxNi45NTQsOTUuOTEsMTYuMjkyLDk1Ljk5OSwxNS42MTcsOTUuOTk5eiIgb3BhY2l0eT0iLjM1Ij48L3BhdGg+PHBhdGggZmlsbD0iI2YyZjJmMiIgZD0iTTEzLjYxNyw5My45OTljLTIuMDA2LDAtMy44ODctMC43ODUtNS4yOTgtMi4yMWMtMS44NjktMS45MDEtMi41OS00LjY2LTEuODkxLTcuMjExbDQuMzYzLTE1LjkzMiBjLTIuODM3LTUuODk0LTQuMzI3LTEyLjQxMi00LjMyMy0xOC45NzdDNi40NzgsMjUuNTksMjYuMDc0LDYsNTAuMTUyLDZjMTEuNjgsMC4wMDQsMjIuNjUzLDQuNTUzLDMwLjkwMSwxMi44MDggYzguMjQ4LDguMjU2LDEyLjc4NywxOS4yMjgsMTIuNzgzLDMwLjg5NGMtMC4wMDksMjQuMDgtMTkuNjA2LDQzLjY3LTQzLjY4NCw0My42N2MtNi4yNDQtMC4wMDItMTIuNDc2LTEuMzYxLTE4LjE0My0zLjk0MyBsLTE2LjUwMSw0LjMyNkMxNC45NTQsOTMuOTEsMTQuMjkyLDkzLjk5OSwxMy42MTcsOTMuOTk5eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNmMmYyZjIiIGQ9Ik0xMy42MTcsODcuNDk5Yy0wLjI1MiwwLTAuNDk2LTAuMDk5LTAuNjc3LTAuMjgyYy0wLjIzOS0wLjI0Mi0wLjMzMi0wLjU5NS0wLjI0Mi0wLjkyMiBsNS4wMzYtMTguMzg4Yy0zLjEyMi01LjU0NS00Ljc2OS0xMS44NDItNC43NjUtMTguMjM1QzEyLjk3NiwyOS4xNzQsMjkuNjU2LDEyLjUsNTAuMTUyLDEyLjUgYzkuOTQyLDAuMDA0LDE5LjI4MywzLjg3NiwyNi4zMDMsMTAuOTAyYzcuMDIsNy4wMjgsMTAuODg1LDE2LjM2NywxMC44ODEsMjYuMjk3Yy0wLjAwOCwyMC40OTYtMTYuNjg5LDM3LjE3Mi0zNy4xODQsMzcuMTcyIGMtNi4wODUtMC4wMDItMTIuMTA2LTEuNTA0LTE3LjQ0OS00LjM0NWwtMTguODQ0LDQuOTRDMTMuNzc5LDg3LjQ4OSwxMy42OTksODcuNDk5LDEzLjYxNyw4Ny40OTl6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzQwMzk2ZSIgZD0iTTEzLjYxNyw4OC45OTljLTAuNjYsMC0xLjI4LTAuMjU4LTEuNzQ0LTAuNzI3Yy0wLjYxNS0wLjYyNS0wLjg1My0xLjUzNC0wLjYyMy0yLjM3NGw0Ljg3NS0xNy44IGMtMy4wNTItNS42MzQtNC42NjEtMTEuOTkxLTQuNjU3LTE4LjQyN0MxMS40NzcsMjguMzQ4LDI4LjgzLDExLDUwLjE1MiwxMWMxMC4zNDIsMC4wMDQsMjAuMDYsNC4wMzIsMjcuMzY0LDExLjM0MiBjNy4zMDQsNy4zMTEsMTEuMzI0LDE3LjAyNywxMS4zMiwyNy4zNTdjLTAuMDA4LDIxLjMyNC0xNy4zNjEsMzguNjcyLTM4LjY4NCwzOC42NzJjLTYuMTIxLTAuMDAyLTEyLjIwMy0xLjQ2OS0xNy42MjktNC4yNDcgTDE0LjI0LDg4LjkxOEMxNC4wNTYsODguOTY5LDEzLjgzOCw4OC45OTksMTMuNjE3LDg4Ljk5OXogTTEzLjQ3Nyw4Ni4wMTdjLTAuMDA3LDAuMDAyLTAuMDE1LDAuMDA0LTAuMDIyLDAuMDA2TDEzLjQ3Nyw4Ni4wMTd6IE01MC4xNTIsMTRjLTE5LjY2OCwwLTM1LjY3NiwxNi4wMDMtMzUuNjg0LDM1LjY3M2MtMC4wMDMsNi4xMjksMS41NzgsMTIuMTgsNC41NzIsMTcuNDk5YzAuMTk0LDAuMzQ0LDAuMjQ0LDAuNzUxLDAuMTQsMS4xMzIgbC00Ljc4NiwxNy40NzNsMTcuOTI4LTQuNzAxYzAuMzY0LTAuMDk2LDAuNzUxLTAuMDUsMS4wODQsMC4xMjdjNS4xMjYsMi43MjYsMTAuOTE3LDQuMTY3LDE2Ljc0Niw0LjE2OSBjMTkuNjY4LDAsMzUuNjc2LTE2LjAwMywzNS42ODMtMzUuNjczYzAuMDA0LTkuNTI5LTMuNzA1LTE4LjQ5Mi0xMC40NDItMjUuMjM2QzY4LjY1NywxNy43MTksNTkuNjkyLDE0LjAwNCw1MC4xNTIsMTR6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzk2YzM2MiIgZD0iTTcxLjE3NywyOC42NzRjLTUuNjEzLTUuNjE3LTEzLjA3NC04LjcxMi0yMS4wMTUtOC43MTNjLTE2LjM5NSwwLTI5LjcyOSwxMy4zMjgtMjkuNzM2LDI5LjcxMiBjLTAuMDAyLDUuNjE1LDEuNTY5LDExLjA4MSw0LjU0NSwxNS44MTVsMC43MDgsMS4xMjRsLTMuMDA0LDEwLjk2NGwxMS4yNTEtMi45NWwxLjA4NywwLjY0NGM0LjU2MiwyLjcwOSw5Ljc5NSw0LjE0LDE1LjEyOSw0LjE0MiBoMC4wMTFjMTYuMzgzLDAsMjkuNzE3LTEzLjMzLDI5LjcyMy0yOS43MTVDNzkuODc3LDQxLjc1OCw3Ni43OSwzNC4yOTEsNzEuMTc3LDI4LjY3NHoiPjwvcGF0aD48Zz48cGF0aCBmaWxsPSIjZjJmMmYyIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik00MS4wOTYsMzQuNTNjLTAuNjc3LTEuNTA3LTEuMzkxLTEuNTM4LTIuMDM4LTEuNTY1IGMtMC41MjktMC4wMjMtMS4xMzItMC4wMjEtMS43MzUtMC4wMjFzLTEuNTg0LDAuMjI3LTIuNDE0LDEuMTMzYy0wLjgzLDAuOTA2LTMuMTcsMy4wOTUtMy4xNyw3LjU0OXMzLjI0NCw4Ljc1OSwzLjY5Niw5LjM2MiBjMC40NTIsMC42MDMsNi4yNjMsMTAuMDM1LDE1LjQ2NCwxMy42NjVjNy42NDYsMy4wMTUsOS4yMDMsMi40MTYsMTAuODY0LDIuMjY1YzEuNjYtMC4xNTEsNS4zNTYtMi4xODksNi4xMS00LjMwMyBjMC43NTQtMi4xMTQsMC43NTQtMy45MjUsMC41MjktNC4zMDNjLTAuMjI3LTAuMzc4LTAuODMtMC42MDMtMS43MzUtMS4wNTdjLTAuOTA0LTAuNDU0LTUuMzU2LTIuNjQzLTYuMTg2LTIuOTQ0IGMtMC44My0wLjMwMS0xLjQzMy0wLjQ1Mi0yLjAzOCwwLjQ1NGMtMC42MDMsMC45MDQtMi4zMzgsMi45NDQtMi44NjYsMy41NDdjLTAuNTI5LDAuNjA1LTEuMDU3LDAuNjgxLTEuOTYyLDAuMjI3IGMtMC45MDUtMC40NTQtMy44Mi0xLjQwOC03LjI4LTQuNDkyYy0yLjY5MS0yLjM5OS00LjUwNy01LjM2Mi01LjAzNi02LjI2OWMtMC41MjktMC45MDQtMC4wNTctMS4zOTUsMC4zOTctMS44NDcgYzAuNDA2LTAuNDA2LDAuOTA1LTEuMDU3LDEuMzU5LTEuNTg2YzAuNDUyLTAuNTI5LDAuNjAzLTAuOTA2LDAuOTA0LTEuNTA5YzAuMzAyLTAuNjA1LDAuMTUxLTEuMTMzLTAuMDc2LTEuNTg2IEM0My42Niw0MC43OTcsNDEuOTAxLDM2LjMyLDQxLjA5NiwzNC41M3oiIGNsaXAtcnVsZT0iZXZlbm9kZCI+PC9wYXRoPjwvZz48L3N2Zz4="/> 91 98412-6477</span>
      </a>
      <span class="hx-style-3 dol-f-16 dol-f-nunito-extra-light mw-pad-l-50">Faça sua denúncia pelo WhatsApp do Diário e apareça no DOL!</span>
      <div class="dol-h-50 text-center p-2 mt-3">
      <a class="redesocial1" href="https://twitter.com/doldiarioonline" target="_blank" rel="external noopener nofollow" title="Twitter"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNDgiIGhlaWdodD0iNDgiCnZpZXdCb3g9IjAgMCA0OCA0OCIKc3R5bGU9IiBmaWxsOiMwMDAwMDA7Ij48cGF0aCBmaWxsPSIjMDNhOWY0IiBkPSJNMjQgNEEyMCAyMCAwIDEgMCAyNCA0NEEyMCAyMCAwIDEgMCAyNCA0WiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik0zNiwxNy4xMmMtMC44ODIsMC4zOTEtMS45OTksMC43NTgtMywwLjg4YzEuMDE4LTAuNjA0LDIuNjMzLTEuODYyLDMtMyBjLTAuOTUxLDAuNTU5LTIuNjcxLDEuMTU2LTMuNzkzLDEuMzcyQzMxLjMxMSwxNS40MjIsMzAuMDMzLDE1LDI4LjYxNywxNUMyNS44OTcsMTUsMjQsMTcuMzA1LDI0LDIwdjJjLTQsMC03LjktMy4wNDctMTAuMzI3LTYgYy0wLjQyNywwLjcyMS0wLjY2NywxLjU2NS0wLjY2NywyLjQ1N2MwLDEuODE5LDEuNjcxLDMuNjY1LDIuOTk0LDQuNTQzYy0wLjgwNy0wLjAyNS0yLjMzNS0wLjY0MS0zLTFjMCwwLjAxNiwwLDAuMDM2LDAsMC4wNTcgYzAsMi4zNjcsMS42NjEsMy45NzQsMy45MTIsNC40MjJDMTYuNTAxLDI2LjU5MiwxNiwyNywxNC4wNzIsMjdjMC42MjYsMS45MzUsMy43NzMsMi45NTgsNS45MjgsM2MtMS42ODYsMS4zMDctNC42OTIsMi03LDIgYy0wLjM5OSwwLTAuNjE1LDAuMDIyLTEtMC4wMjNDMTQuMTc4LDMzLjM1NywxNy4yMiwzNCwyMCwzNGM5LjA1NywwLDE0LTYuOTE4LDE0LTEzLjM3YzAtMC4yMTItMC4wMDctMC45MjItMC4wMTgtMS4xMyBDMzQuOTUsMTguODE4LDM1LjM0MiwxOC4xMDQsMzYsMTcuMTIiPjwvcGF0aD48L3N2Zz4="/></a>
      <a class="redesocial2" href="https://www.facebook.com/doldiarioonline" rel="external noopener nofollow" target="_blank" title="Facebook"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNDgiIGhlaWdodD0iNDgiCnZpZXdCb3g9IjAgMCA0OCA0OCIKc3R5bGU9IiBmaWxsOiMwMDAwMDA7Ij48bGluZWFyR3JhZGllbnQgaWQ9IkxkNnNxcnRjeE15Y2tFbDZ4ZURkTWFfdUxXVjVBOXZYSVB1X2dyMSIgeDE9IjkuOTkzIiB4Mj0iNDAuNjE1IiB5MT0iOS45OTMiIHkyPSI0MC42MTUiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiMyYWE0ZjQiPjwvc3RvcD48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMwMDdhZDkiPjwvc3RvcD48L2xpbmVhckdyYWRpZW50PjxwYXRoIGZpbGw9InVybCgjTGQ2c3FydGN4TXlja0VsNnhlRGRNYV91TFdWNUE5dlhJUHVfZ3IxKSIgZD0iTTI0LDRDMTIuOTU0LDQsNCwxMi45NTQsNCwyNHM4Ljk1NCwyMCwyMCwyMHMyMC04Ljk1NCwyMC0yMFMzNS4wNDYsNCwyNCw0eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik0yNi43MDcsMjkuMzAxaDUuMTc2bDAuODEzLTUuMjU4aC01Ljk4OXYtMi44NzRjMC0yLjE4NCwwLjcxNC00LjEyMSwyLjc1Ny00LjEyMWgzLjI4M1YxMi40NiBjLTAuNTc3LTAuMDc4LTEuNzk3LTAuMjQ4LTQuMTAyLTAuMjQ4Yy00LjgxNCwwLTcuNjM2LDIuNTQyLTcuNjM2LDguMzM0djMuNDk4SDE2LjA2djUuMjU4aDQuOTQ4djE0LjQ1MiBDMjEuOTg4LDQzLjksMjIuOTgxLDQ0LDI0LDQ0YzAuOTIxLDAsMS44Mi0wLjA4NCwyLjcwNy0wLjIwNFYyOS4zMDF6Ij48L3BhdGg+PC9zdmc+"/></a>
      <a class="redesocial3" href="https://www.instagram.com/doloficial/" rel="external noopener nofollow" target="_blank" title="Instagram"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNDgiIGhlaWdodD0iNDgiCnZpZXdCb3g9IjAgMCA0OCA0OCIKc3R5bGU9IiBmaWxsOiMwMDAwMDA7Ij48cGF0aCBmaWxsPSIjMzA0ZmZlIiBkPSJNNDEuNjcsMTMuNDhjLTAuNCwwLjI2LTAuOTcsMC41LTEuMjEsMC43N2MtMC4wOSwwLjA5LTAuMTQsMC4xOS0wLjEyLDAuMjl2MS4wM2wtMC4zLDEuMDFsLTAuMywxbC0wLjMzLDEuMSBsLTAuNjgsMi4yNWwtMC42NiwyLjIybC0wLjUsMS42N2MwLDAuMjYtMC4wMSwwLjUyLTAuMDMsMC43N2MtMC4wNywwLjk2LTAuMjcsMS44OC0wLjU5LDIuNzRjLTAuMTksMC41My0wLjQyLDEuMDQtMC43LDEuNTIgYy0wLjEsMC4xOS0wLjIyLDAuMzgtMC4zNCwwLjU2Yy0wLjQsMC42My0wLjg4LDEuMjEtMS40MSwxLjcyYy0wLjQxLDAuNDEtMC44NiwwLjc5LTEuMzUsMS4xMWMwLDAsMCwwLTAuMDEsMCBjLTAuMDgsMC4wNy0wLjE3LDAuMTMtMC4yNywwLjE4Yy0wLjMxLDAuMjEtMC42NCwwLjM5LTAuOTgsMC41NWMtMC4yMywwLjEyLTAuNDYsMC4yMi0wLjcsMC4zMWMtMC4wNSwwLjAzLTAuMTEsMC4wNS0wLjE2LDAuMDcgYy0wLjU3LDAuMjctMS4yMywwLjQ1LTEuODksMC41NGMtMC4wNCwwLjAxLTAuMDcsMC4wMS0wLjExLDAuMDJjLTAuNCwwLjA3LTAuNzksMC4xMy0xLjE5LDAuMTZjLTAuMTgsMC4wMi0wLjM3LDAuMDMtMC41NSwwLjAzIGwtMC43MS0wLjA0bC0zLjQyLTAuMThjMC0wLjAxLTAuMDEsMC0wLjAxLDBsLTEuNzItMC4wOWMtMC4xMywwLTAuMjcsMC0wLjQtMC4wMWMtMC41NC0wLjAyLTEuMDYtMC4wOC0xLjU4LTAuMTkgYy0wLjAxLDAtMC4wMSwwLTAuMDEsMGMtMC45NS0wLjE4LTEuODYtMC41LTIuNzEtMC45M2MtMC40Ny0wLjI0LTAuOTMtMC41MS0xLjM2LTAuODJjLTAuMTgtMC4xMy0wLjM1LTAuMjctMC41Mi0wLjQyIGMtMC40OC0wLjQtMC45MS0wLjgzLTEuMzEtMS4yN2MtMC4wNi0wLjA2LTAuMTEtMC4xMi0wLjE2LTAuMThjLTAuMDYtMC4wNi0wLjEyLTAuMTMtMC4xNy0wLjE5Yy0wLjM4LTAuNDgtMC43LTAuOTctMC45Ni0xLjQ5IGMtMC4yNC0wLjQ2LTAuNDMtMC45NS0wLjU4LTEuNDljLTAuMDYtMC4xOS0wLjExLTAuMzctMC4xNS0wLjU3Yy0wLjAxLTAuMDEtMC4wMi0wLjAzLTAuMDItMC4wNWMtMC4xLTAuNDEtMC4xOS0wLjg0LTAuMjQtMS4yNyBjLTAuMDYtMC4zMy0wLjA5LTAuNjYtMC4wOS0xYy0wLjAyLTAuMTMtMC4wMi0wLjI3LTAuMDItMC40bDEuOTEtMi45NWwxLjg3LTIuODhsMC44NS0xLjMxbDAuNzctMS4xOGwwLjI2LTAuNDF2LTEuMDMgYzAuMDItMC4yMywwLjAzLTAuNDcsMC4wMi0wLjY5Yy0wLjAxLTAuNy0wLjE1LTEuMzgtMC4zOC0yLjAzYy0wLjIyLTAuNjktMC41My0xLjM0LTAuODUtMS45NGMtMC4zOC0wLjY5LTAuNzgtMS4zMS0xLjExLTEuODcgQzE0LDcuNCwxMy42Niw2LjczLDEzLjc1LDYuMjZDMTQuNDcsNi4wOSwxNS4yMyw2LDE2LDZoMTZjNC4xOCwwLDcuNzgsMi42LDkuMjcsNi4yNkM0MS40MywxMi42NSw0MS41NywxMy4wNiw0MS42NywxMy40OHoiPjwvcGF0aD48cGF0aCBmaWxsPSIjNDkyOGY0IiBkPSJNNDIsMTZ2MC4yN2wtMS4zOCwwLjhsLTAuODgsMC41MWwtMC45NywwLjU2bC0xLjk0LDEuMTNsLTEuOSwxLjFsLTEuOTQsMS4xMmwtMC43NywwLjQ1IGMwLDAuNDgtMC4xMiwwLjkyLTAuMzQsMS4zMmMtMC4zMSwwLjU4LTAuODMsMS4wNi0xLjQ5LDEuNDdjLTAuNjcsMC40MS0xLjQ5LDAuNzQtMi40MSwwLjk4YzAsMCwwLTAuMDEtMC4wMSwwIGMtMy41NiwwLjkyLTguNDIsMC41LTEwLjc4LTEuMjZjLTAuNjYtMC40OS0xLjEyLTEuMDktMS4zMi0xLjc4Yy0wLjA2LTAuMjMtMC4wOS0wLjQ4LTAuMDktMC43M3YtNy4xOSBjMC4wMS0wLjE1LTAuMDktMC4zLTAuMjctMC40NWMtMC41NC0wLjQzLTEuODEtMC44NC0zLjIzLTEuMjVjLTEuMTEtMC4zMS0yLjMtMC42Mi0zLjMtMC45MmMtMC43OS0wLjI0LTEuNDYtMC40OC0xLjg2LTAuNzEgYzAuMTgtMC4zNSwwLjM5LTAuNywwLjYxLTEuMDNjMS40LTIuMDUsMy41NC0zLjU2LDYuMDItNC4xM0MxNC40Nyw2LjA5LDE1LjIzLDYsMTYsNmgxMC44YzUuMzcsMC45NCwxMC4zMiwzLjEzLDE0LjQ3LDYuMjYgYzAuMTYsMC4zOSwwLjMsMC44LDAuNCwxLjIyYzAuMTgsMC42NiwwLjI5LDEuMzQsMC4zMiwyLjA1QzQyLDE1LjY4LDQyLDE1Ljg0LDQyLDE2eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiM2MjAwZWEiIGQ9Ik00MiwxNnY0LjQxbC0wLjIyLDAuNjhsLTAuNzUsMi4zM2wtMC43OCwyLjRsLTAuNDEsMS4yOGwtMC4zOCwxLjE5bC0wLjM3LDEuMTNsLTAuMzYsMS4xMmwtMC4xOSwwLjU5IGwtMC4yNSwwLjc4YzAsMC43Ni0wLjAyLDEuNDMtMC4wNywyYy0wLjAxLDAuMDYtMC4wMiwwLjEyLTAuMDIsMC4xOGMtMC4wNiwwLjUzLTAuMTQsMC45OC0wLjI3LDEuMzYgYy0wLjAxLDAuMDYtMC4wMywwLjEyLTAuMDUsMC4xN2MtMC4yNiwwLjcyLTAuNjUsMS4xOC0xLjIzLDEuNDhjLTAuMTQsMC4wOC0wLjMsMC4xNC0wLjQ3LDAuMmMtMC41MywwLjE4LTEuMiwwLjI3LTIuMDIsMC4zMiBjLTAuNiwwLjA0LTEuMjksMC4wNS0yLjA3LDAuMDVIMzEuNGwtMS4xOS0wLjA1TDMwLDM3LjYxbC0yLjE3LTAuMDlsLTIuMi0wLjA5bC03LjI1LTAuM2wtMS44OC0wLjA4aC0wLjI2IGMtMC43OC0wLjAxLTEuNDUtMC4wNi0yLjAzLTAuMTRjLTAuODQtMC4xMy0xLjQ5LTAuMzUtMS45OC0wLjY4Yy0wLjctMC40NS0xLjExLTEuMTEtMS4zNS0yLjAzYy0wLjA2LTAuMjItMC4xMS0wLjQ1LTAuMTQtMC43IGMtMC4xLTAuNTgtMC4xNS0xLjI1LTAuMTgtMmMwLTAuMTUsMC0wLjMtMC4wMS0wLjQ2Yy0wLjAxLTAuMDEsMC0wLjAxLDAtMC4wMXYtMC41OGMtMC4wMS0wLjI5LTAuMDEtMC41OS0wLjAxLTAuOWwwLjA1LTEuNjEgbDAuMDMtMS4xNWwwLjA0LTEuMzR2LTAuMTlsMC4wNy0yLjQ2bDAuMDctMi40NmwwLjA3LTIuMzFsMC4wNi0yLjI3bDAuMDItMC42YzAtMC4zMS0xLjA1LTAuNDktMi4yMi0wLjY0IGMtMC45My0wLjEyLTEuOTUtMC4yMy0yLjU2LTAuMzdjMC4wNS0wLjIzLDAuMS0wLjQ2LDAuMTYtMC42OGMwLjE4LTAuNzIsMC40NS0xLjQsMC43OS0yLjA1YzAuMTgtMC4zNSwwLjM5LTAuNywwLjYxLTEuMDMgYzIuMTYtMC45NSw0LjQxLTEuNjksNi43Ni0yLjE3YzIuMDYtMC40Myw0LjIxLTAuNjYsNi40My0wLjY2YzcuMzYsMCwxNC4xNiwyLjQ5LDE5LjU0LDYuNjljMC41MiwwLjQsMS4wMywwLjgzLDEuNTMsMS4yOCBDNDIsMTUuNjgsNDIsMTUuODQsNDIsMTZ6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzY3M2FiNyIgZD0iTTQyLDE4LjM3djQuNTRsLTAuNTUsMS4wNmwtMS4wNSwyLjA1bC0wLjU2LDEuMDhsLTAuNTEsMC45OWwtMC4yMiwwLjQzYzAsMC4zMSwwLDAuNjEtMC4wMiwwLjkgYzAsMC40My0wLjAyLDAuODQtMC4wNSwxLjIyYy0wLjA0LDAuNDUtMC4xLDAuODYtMC4xNiwxLjI0Yy0wLjE1LDAuNzktMC4zNiwxLjQ3LTAuNjYsMi4wM2MtMC4wNCwwLjA3LTAuMDgsMC4xNC0wLjEyLDAuMiBjLTAuMTEsMC4xOC0wLjI0LDAuMzUtMC4zOCwwLjUxYy0wLjE4LDAuMjItMC4zOCwwLjQxLTAuNjEsMC41N2MtMC4zNCwwLjI2LTAuNzQsMC40Ny0xLjIsMC42M2MtMC41NywwLjIxLTEuMjMsMC4zNS0yLjAxLDAuNDMgYy0wLjUxLDAuMDUtMS4wNywwLjA4LTEuNjgsMC4wOGwtMC40MiwwLjAybC0yLjA4LDAuMTJoLTAuMDFMMjcuNSwzNi42bC0yLjI1LDAuMTNsLTMuMSwwLjE4bC0zLjc3LDAuMjJsLTAuNTUsMC4wMyBjLTAuNTEsMC0wLjk5LTAuMDMtMS40NS0wLjA5Yy0wLjA1LTAuMDEtMC4wOS0wLjAyLTAuMTQtMC4wMmMtMC42OC0wLjExLTEuMy0wLjI5LTEuODYtMC41NGMtMC42OC0wLjMtMS4yNy0wLjctMS43Ny0xLjE4IGMtMC40NC0wLjQzLTAuODItMC45Mi0xLjEzLTEuNDdjLTAuMDctMC4xMy0wLjE0LTAuMjUtMC4yLTAuMzljLTAuMy0wLjU5LTAuNTQtMS4yNS0wLjcyLTEuOTdjLTAuMDMtMC4xMi0wLjA2LTAuMjUtMC4wOC0wLjM4IGMtMC4wNi0wLjIzLTAuMTEtMC40Ny0wLjE0LTAuNzJjLTAuMTEtMC42NC0wLjE3LTEuMzItMC4yLTIuMDN2LTAuMDFjLTAuMDEtMC4yOS0wLjAyLTAuNTctMC4wMi0wLjg3bC0wLjQ5LTEuMTdsLTAuMDctMC4xOCBMOS41LDI1Ljk5TDguNzUsMjQuMmwtMC4xMi0wLjI5bC0wLjcyLTEuNzNsLTAuOC0xLjkzYzAsMCwwLDAtMC4wMSwwTDYuMjksMTguM0w2LDE3LjU5VjE2YzAtMC42MywwLjA2LTEuMjUsMC4xNy0xLjg1IGMwLjA1LTAuMjMsMC4xLTAuNDYsMC4xNi0wLjY4YzAuODUtMC40OSwxLjc0LTAuOTQsMi42NS0xLjM0YzIuMDgtMC45Myw0LjMxLTEuNjIsNi42Mi0yLjA0YzEuNzItMC4zMSwzLjUxLTAuNDgsNS4zMi0wLjQ4IGM3LjMxLDAsMTMuOTQsMi42NSwxOS4xMiw2Ljk3YzAuMiwwLjE2LDAuMzksMC4zMiwwLjU4LDAuNDlDNDEuMDksMTcuNDgsNDEuNTUsMTcuOTEsNDIsMTguMzd6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzhlMjRhYSIgZD0iTTQyLDIxLjM1djUuMTRsLTAuNTcsMS4xOWwtMS4wOCwyLjI1bC0wLjAxLDAuMDNjMCwwLjQzLTAuMDIsMC44Mi0wLjA1LDEuMTdjLTAuMSwxLjE1LTAuMzgsMS44OC0wLjg0LDIuMzMgYy0wLjMzLDAuMzQtMC43NCwwLjUzLTEuMjUsMC42M2MtMC4wMywwLjAxLTAuMDcsMC4wMS0wLjEsMC4wMmMtMC4xNiwwLjAzLTAuMzMsMC4wNS0wLjUxLDAuMDVjLTAuNjIsMC4wNi0xLjM1LDAuMDItMi4xOS0wLjA0IGMtMC4wOSwwLTAuMTktMC4wMS0wLjI5LTAuMDJjLTAuNjEtMC4wNC0xLjI2LTAuMDgtMS45OC0wLjExYy0wLjM5LTAuMDEtMC44LTAuMDItMS4yMi0wLjAyaC0wLjAybC0xLjAxLDAuMDhoLTAuMDFsLTIuMjcsMC4xNiBsLTIuNTksMC4ybC0wLjM4LDAuMDNsLTMuMDMsMC4yMmwtMS41NywwLjEybC0xLjU1LDAuMTFjLTAuMjcsMC0wLjUzLDAtMC43OS0wLjAxYzAsMC0wLjAxLTAuMDEtMC4wMSwwIGMtMS4xMy0wLjAyLTIuMTQtMC4wOS0zLjA0LTAuMjZjLTAuODMtMC4xNC0xLjU2LTAuMzYtMi4xOC0wLjY5Yy0wLjY0LTAuMzEtMS4xNy0wLjc1LTEuNi0xLjMxYy0wLjQxLTAuNTUtMC43MS0xLjI0LTAuOS0yLjA3IGMwLTAuMDEsMC0wLjAxLDAtMC4wMWMtMC4xNC0wLjY3LTAuMjItMS40NS0wLjIyLTIuMzNsLTAuMTUtMC4yN0w5LjcsMjYuMzVsLTAuMTMtMC4yMkw5LjUsMjUuOTlsLTAuOTMtMS42NWwtMC40Ni0wLjgzIGwtMC41OC0xLjAzbC0xLTEuNzlMNiwxOS43NXYtMy42OGMwLjg4LTAuNTgsMS43OS0xLjA5LDIuNzMtMS41NWMxLjE0LTAuNTgsMi4zMi0xLjA3LDMuNTUtMS40N2MxLjM0LTAuNDQsMi43NC0wLjc5LDQuMTctMS4wMiBjMS40NS0wLjI0LDIuOTQtMC4zNiw0LjQ3LTAuMzZjNi44LDAsMTMuMDQsMi40MywxNy44NSw2LjQ3YzAuMjIsMC4xNywwLjQzLDAuMzYsMC42NCwwLjU0YzAuODQsMC43NSwxLjY0LDEuNTYsMi4zNywyLjQxIEM0MS44NiwyMS4xOCw0MS45NCwyMS4yNiw0MiwyMS4zNXoiPjwvcGF0aD48cGF0aCBmaWxsPSIjYzIxODViIiBkPSJNNDIsMjQuNzF2Ny4yM2MtMC4yNC0wLjE0LTAuNTctMC4zMS0wLjk4LTAuNDljLTAuMjItMC4xMS0wLjQ3LTAuMjItMC43My0wLjMyIGMtMC4zOC0wLjE3LTAuNzktMC4zMy0xLjI1LTAuNDljLTAuMS0wLjA0LTAuMi0wLjA3LTAuMzEtMC4xYy0wLjE4LTAuMDctMC4zNy0wLjEzLTAuNTYtMC4xOWMtMC41OS0wLjE4LTEuMjQtMC4zNS0xLjkyLTAuNSBjLTAuMjYtMC4wNS0wLjUzLTAuMS0wLjgtMC4xNGMtMC44Ny0wLjE1LTEuOC0wLjI0LTIuNzctMC4yNWMtMC4wOC0wLjAxLTAuMTctMC4wMS0wLjI1LTAuMDFsLTIuNTcsMC4wMmwtMy41LDAuMDJoLTAuMDEgbC03LjQ5LDAuMDZjLTIuMzgsMC0zLjg0LDAuNTctNC43MiwwLjhjMCwwLTAuMDEsMC0wLjAxLDAuMDFjLTAuOTMsMC4yNC0xLjIyLDAuMDktMS4zLTEuNTRjLTAuMDItMC40NS0wLjAzLTEuMDMtMC4wMy0xLjc0IGwtMC41Ni0wLjQzbC0wLjk4LTAuNzRsLTAuNi0wLjQ2bC0wLjEyLTAuMDlMOC44OCwyNC4xbC0wLjI1LTAuMTlsLTAuNTItMC40bC0wLjk2LTAuNzJMNiwyMS45MXYtMy40IGMwLjEtMC4wOCwwLjE5LTAuMTUsMC4yOS0wLjIxYzEuNDUtMSwzLTEuODUsNC42NC0yLjU0YzEuNDYtMC42MiwzLTEuMTEsNC41OC0xLjQ2YzAuNDMtMC4wOSwwLjg3LTAuMTgsMS4zMi0wLjI0IGMxLjMzLTAuMjMsMi43LTAuMzQsNC4wOS0wLjM0YzYuMDEsMCwxMS41MywyLjA5LDE1LjkxLDUuNTVjMC42NiwwLjUyLDEuMywxLjA3LDEuOSwxLjY2YzAuODIsMC43OCwxLjU5LDEuNjEsMi4zLDIuNDkgYzAuMTQsMC4xOCwwLjI4LDAuMzYsMC40MiwwLjU1QzQxLjY0LDI0LjIxLDQxLjgyLDI0LjQ2LDQyLDI0LjcxeiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNkODFiNjAiIGQ9Ik00MiwyOC43MlYzMmMwLDAuNjUtMC4wNiwxLjI5LTAuMTgsMS45MWMtMC4xOCwwLjkyLTAuNDksMS44LTAuOTEsMi42MmMtMC4yMiwwLjA1LTAuNDcsMC4wNS0wLjc1LDAuMDEgYy0wLjYzLTAuMTEtMS4zNy0wLjQ0LTIuMTctMC44N2MtMC4wNC0wLjAxLTAuMDgtMC4wMy0wLjExLTAuMDVjLTAuMjUtMC4xMy0wLjUxLTAuMjctMC43Ny0wLjQzYy0wLjUzLTAuMjktMS4wOS0wLjYxLTEuNjUtMC45MSBjLTAuMTItMC4wNi0wLjI0LTAuMTItMC4zNS0wLjE4Yy0wLjY0LTAuMzMtMS4zLTAuNjMtMS45Ni0wLjg2YzAsMCwwLDAtMC4wMSwwYy0wLjE0LTAuMDUtMC4yOS0wLjEtMC40NC0wLjE0IGMtMC41Ny0wLjE2LTEuMTUtMC4yNi0xLjcxLTAuMjZsLTEuMS0wLjMybC00Ljg3LTEuNDFjMCwwLDAsMC0wLjAxLDBsLTIuOTktMC44N2gtMC4wMWwtMS4zLTAuMzhjLTMuNzYsMC02LjA3LDEuNi03LjE5LDAuOTkgYy0wLjQ0LTAuMjMtMC43LTAuODEtMC43OS0xLjk1Yy0wLjAzLTAuMzItMC4wNC0wLjY4LTAuMDQtMS4xbC0xLjE3LTAuNTdsLTAuMDUtMC4wMmgtMC4wMWwtMC44NC0wLjQyTDkuNywyNi4zNWwtMC4wNy0wLjAzIGwtMC4xNy0wLjA5TDcuNSwyNS4yOEw2LDI0LjU1di0zLjQzYzAuMTctMC4xNSwwLjM1LTAuMjksMC41My0wLjQzYzAuMTktMC4xNSwwLjM4LTAuMjksMC41Ny0wLjQ0YzAuMDEsMCwwLjAxLDAsMC4wMSwwIGMxLjE4LTAuODUsMi40My0xLjYsMy43Ni0yLjIyYzEuNTUtMC43NCwzLjItMS4zMSw0LjkxLTEuNjhjMC4yNS0wLjA2LDAuNTEtMC4xMiwwLjc3LTAuMTZjMS40Mi0wLjI3LDIuODgtMC40MSw0LjM3LTAuNDEgYzUuMjcsMCwxMC4xMSwxLjcxLDE0LjAxLDQuNTljMS4xMywwLjg0LDIuMTgsMS43NywzLjE0LDIuNzhjMC43OSwwLjgzLDEuNTIsMS43MywyLjE4LDIuNjdjMC4wNSwwLjA3LDAuMSwwLjE0LDAuMTUsMC4yIGMwLjM3LDAuNTQsMC43MSwxLjA5LDEuMDMsMS42NkM0MS42NCwyOC4wMiw0MS44MiwyOC4zNyw0MiwyOC43MnoiPjwvcGF0aD48cGF0aCBmaWxsPSI
        jZjUwMDU3IiBkPSJNNDEuODIsMzMuOTFjLTAuMTgsMC45Mi0wLjQ5LDEuOC0wLjkxLDIuNjJjLTAuMTksMC4zNy0wLjQsMC43Mi0wLjYzLDEuMDZjLTAuMTQsMC4yMS0wLjI5LDAuNDEtMC40NCwwLjYgYy0wLjM2LTAuMTQtMC44OS0wLjM0LTEuNTQtMC41NmMwLDAsMCwwLDAtMC4wMWMtMC40OS0wLjE3LTEuMDUtMC4zNS0xLjY1LTAuNTJjLTAuMTctMC4wNS0wLjM0LTAuMS0wLjUyLTAuMTUgYy0wLjcxLTAuMTktMS40NS0wLjM2LTIuMTctMC40NmMtMC42LTAuMS0xLjE5LTAuMTYtMS43NC0wLjE2bC0wLjQ2LTAuMTNoLTAuMDFsLTIuNDItMC43bC0xLjQ5LTAuNDNsLTEuNjYtMC40OGgtMC4wMWwtMC41NC0wLjE1IGwtNi41My0xLjg4bC0xLjg4LTAuNTRsLTEuNC0wLjMzbC0yLjI4LTAuNTRsLTAuMjgtMC4wN2MwLDAsMCwwLTAuMDEsMGwtMi4yOS0wLjUzYzAtMC4wMSwwLTAuMDEsMC0wLjAxbC0wLjQxLTAuMDlsLTAuMjEtMC4wNSBsLTEuNjctMC4zOWwtMC4xOS0wLjA1bC0xLjQyLTEuMTdMNiwyNy45di00LjA4YzAuMzctMC4zNiwwLjc1LTAuNywxLjE1LTEuMDNjMC4xMi0wLjExLDAuMjUtMC4yMSwwLjM4LTAuMzEgYzAuMTItMC4xLDAuMjUtMC4yLDAuMzgtMC4zYzAuOTEtMC42OSwxLjg3LTEuMzEsMi44OS0xLjg0YzEuMy0wLjcsMi42OC0xLjI2LDQuMTMtMS42NmMwLjI4LTAuMDksMC41Ni0wLjE3LDAuODUtMC4yMyBjMS42NC0wLjQxLDMuMzYtMC42Miw1LjE0LTAuNjJjNC40NywwLDguNjMsMS4zNSwxMi4wNywzLjY2YzEuNzEsMS4xNSwzLjI1LDIuNTMsNC41NSw0LjFjMC42NiwwLjc5LDEuMjYsMS42MiwxLjc5LDIuNSBjMC4wNSwwLjA3LDAuMDksMC4xMywwLjEzLDAuMmMwLjMyLDAuNTMsMC42MiwxLjA4LDAuODksMS42NGMwLjI1LDAuNSwwLjQ3LDEsMC42NywxLjUyQzQxLjM0LDMyLjI1LDQxLjYsMzMuMDcsNDEuODIsMzMuOTF6Ij48L3BhdGg+PHBhdGggZmlsbD0iI2ZmMTc0NCIgZD0iTTQwLjI4LDM3LjU5Yy0wLjE0LDAuMjEtMC4yOSwwLjQxLTAuNDQsMC42Yy0wLjQ0LDAuNTUtMC45MiwxLjA1LTEuNDYsMS40OWMtMC40NywwLjM5LTAuOTcsMC43NC0xLjUsMS4wNCBjLTAuMi0wLjA1LTAuNC0wLjExLTAuNjEtMC4xOWMtMC42Ni0wLjIzLTEuMzUtMC42MS0xLjk5LTEuMDFjLTAuOTYtMC42MS0xLjc5LTEuMjctMi4xNi0xLjU3Yy0wLjE0LTAuMTItMC4yMS0wLjE4LTAuMjEtMC4xOCBsLTEuNy0wLjE1TDMwLDM3LjZsLTIuMi0wLjE5bC0yLjI4LTAuMmwtMy4zNy0wLjNsLTUuMzQtMC40N2wtMC4wMi0wLjAxbC0xLjg4LTAuOTFsLTEuOS0wLjkybC0xLjUzLTAuNzRsLTAuMzMtMC4xNmwtMC40MS0wLjIgbC0xLjQyLTAuNjlMNy40MywzMS45bC0wLjU5LTAuMjlMNiwzMS4zNXYtNC40N2MwLjQ3LTAuNTYsMC45Ny0xLjA5LDEuNS0xLjZjMC4zNC0wLjMyLDAuNy0wLjY0LDEuMDctMC45NCBjMC4wNi0wLjA1LDAuMTItMC4xLDAuMTgtMC4xNGMwLjA0LTAuMDUsMC4wOS0wLjA4LDAuMTMtMC4xYzAuNTktMC40OCwxLjIxLTAuOTEsMS44NS0xLjNjMC43NC0wLjQ3LDEuNTItMC44OSwyLjMzLTEuMjQgYzAuODctMC4zOSwxLjc4LTAuNzIsMi43Mi0wLjk3YzEuNjMtMC40NiwzLjM2LTAuNyw1LjE0LTAuN2M0LjA4LDAsNy44NSwxLjI0LDEwLjk2LDMuMzdjMS45OSwxLjM2LDMuNzEsMy4wOCw1LjA3LDUuMDcgYzAuNDUsMC42NCwwLjg1LDEuMzIsMS4yMiwyLjAyYzAuMTMsMC4yNiwwLjI2LDAuNTIsMC4zNywwLjc4YzAuMTIsMC4yNSwwLjIzLDAuNSwwLjM0LDAuNzVjMC4yMSwwLjUyLDAuNCwxLjA0LDAuNTcsMS41OCBjMC4zMiwxLDAuNTYsMi4wMiwwLjcxLDMuMDhDNDAuMjEsMzYuODksNDAuMjUsMzcuMjQsNDAuMjgsMzcuNTl6Ij48L3BhdGg+PHBhdGggZmlsbD0iI2ZmNTcyMiIgZD0iTTM4LjM5LDM5LjQyYzAsMC4wOCwwLDAuMTctMC4wMSwwLjI2Yy0wLjQ3LDAuMzktMC45NywwLjc0LTEuNSwxLjA0Yy0wLjIyLDAuMTItMC40NCwwLjI0LTAuNjcsMC4zNCBjLTAuMjMsMC4xMS0wLjQ2LDAuMjEtMC43LDAuM2MtMC4zNC0wLjE4LTAuOC0wLjQtMS4yOS0wLjYxYy0wLjY5LTAuMzEtMS40NC0wLjU5LTIuMDItMC42OGMtMC4xNC0wLjAzLTAuMjctMC4wNC0wLjM5LTAuMDQgbC0xLjY0LTAuMjFoLTAuMDJsLTIuMDQtMC4yN2wtMi4wNi0wLjI3bC0wLjk2LTAuMTJsLTcuNTYtMC45OGMtMC40OSwwLTEuMDEtMC4wMy0xLjU1LTAuMWMtMC42Ni0wLjA2LTEuMzUtMC4xNi0yLjA0LTAuMyBjLTAuNjgtMC4xMi0xLjM3LTAuMjgtMi4wMy0wLjQ1Yy0wLjY5LTAuMTYtMS4zNy0wLjM1LTItMC41M2MtMC43My0wLjIyLTEuNDEtMC40My0xLjk4LTAuNjJjLTAuNDctMC4xNS0wLjg3LTAuMjktMS4xOC0wLjQgYy0wLjE4LTAuNDMtMC4zMy0wLjg4LTAuNDQtMS4zNEM2LjEsMzMuNjYsNiwzMi44NCw2LDMydi0xLjY3YzAuMzItMC41MywwLjY3LTEuMDUsMS4wNi0xLjU0YzAuNzEtMC45NCwxLjUyLTEuOCwyLjQtMi41NiBjMC4wMy0wLjA0LDAuMDctMC4wNywwLjEtMC4wOWwwLjAxLTAuMDFjMC4zMS0wLjI4LDAuNjMtMC41MywwLjk3LTAuNzdjMC4wNC0wLjA0LDAuMDgtMC4wNywwLjEyLTAuMSBjMC4xNi0wLjEyLDAuMzMtMC4yNCwwLjUxLTAuMzVjMS40My0wLjk3LDMuMDEtMS43Myw0LjctMi4yNGMxLjYtMC40OCwzLjI5LTAuNzMsNS4wNS0wLjczYzMuNDksMCw2Ljc1LDEuMDMsOS40NywyLjc5IGMyLjAxLDEuMjksMy43NCwyLjk5LDUuMDYsNC45OGMwLjE2LDAuMjMsMC4zMSwwLjQ2LDAuNDYsMC43YzAuNjksMS4xNywxLjI2LDIuNDMsMS42OCwzLjc1YzAuMDUsMC4xNSwwLjA5LDAuMywwLjEzLDAuNDYgYzAuMDgsMC4yNywwLjE1LDAuNTUsMC4yMSwwLjgzYzAuMDIsMC4wNywwLjA0LDAuMTQsMC4wNiwwLjIyYzAuMTQsMC42MywwLjI0LDEuMjksMC4zMSwxLjk1YzAsMC4wMSwwLDAuMDEsMCwwLjAxIEMzOC4zNiwzOC4yMiwzOC4zOSwzOC44MiwzOC4zOSwzOS40MnoiPjwvcGF0aD48cGF0aCBmaWxsPSIjZmY2ZjAwIiBkPSJNMzYuMzMsMzkuNDJjMCwwLjM1LTAuMDIsMC43My0wLjA2LDEuMTFjLTAuMDIsMC4xOC0wLjA0LDAuMzYtMC4wNiwwLjUzYy0wLjIzLDAuMTEtMC40NiwwLjIxLTAuNywwLjMgYy0wLjQ1LDAuMTctMC45MSwwLjMxLTEuMzgsMC40MWMtMC4zMiwwLjA3LTAuNjUsMC4xMy0wLjk4LDAuMTZoLTAuMDFjLTAuMzEtMC4xOS0wLjY3LTAuNDItMS4wNC0wLjY4IGMtMC42Ny0wLjQ3LTEuMzctMS0xLjkzLTEuNDNjLTAuMDEtMC4wMS0wLjAxLTAuMDEtMC4wMi0wLjAyYy0wLjU5LTAuNDUtMS4wMS0wLjc5LTEuMDEtMC43OWwtMS4wNiwwLjA0bC0yLjA0LDAuMDdsLTAuOTUsMC4wNCBsLTMuODIsMC4xNGwtMy4yMywwLjEyYy0wLjIxLDAuMDEtMC40NiwwLjAxLTAuNzcsMGgtMC4wMWMtMC40Mi0wLjAxLTAuOTItMC4wNC0xLjQ3LTAuMDljLTAuNjQtMC4wNS0xLjM0LTAuMTEtMi4wNS0wLjE4IGMtMC42OS0wLjA4LTEuMzktMC4xNi0yLjA2LTAuMjRjLTAuNzQtMC4wOC0xLjQ0LTAuMTctMi4wNC0wLjI1Yy0wLjQ3LTAuMDYtMC44OC0wLjExLTEuMjEtMC4xNWMtMC4yOC0wLjMyLTAuNTMtMC42NS0wLjc3LTEuMDEgYy0wLjM2LTAuNTQtMC42Ny0xLjExLTAuOTEtMS43MmMtMC4xOC0wLjQzLTAuMzMtMC44OC0wLjQ0LTEuMzRjMC4yOS0wLjg5LDAuNjctMS43MywxLjEyLTIuNTRjMC4zNi0wLjY2LDAuNzgtMS4yOSwxLjI0LTEuODkgYzAuNDUtMC41OSwwLjk0LTEuMTQsMS40Ny0xLjY0di0wLjAxYzAuMTUtMC4xNSwwLjMtMC4yOSwwLjQ1LTAuNDJjMC4yOC0wLjI2LDAuNTctMC41LDAuODctMC43M2gwLjAxIGMwLjAxLTAuMDIsMC4wMi0wLjAyLDAuMDMtMC4wM2MwLjI0LTAuMTksMC40OS0wLjM2LDAuNzQtMC41M2MxLjQ4LTEuMDEsMy4xNS0xLjc2LDQuOTUtMi4yYzEuMTktMC4yOSwyLjQ0LTAuNDUsMy43My0wLjQ1IGMyLjU0LDAsNC45NCwwLjYxLDcuMDUsMS43MWgwLjAxYzEuODEsMC45MywzLjQxLDIuMjEsNC43LDMuNzVjMC43MSwwLjgyLDEuMzIsMS43MiwxLjgyLDIuNjdjMC4zNSwwLjY0LDAuNjUsMS4zMSwwLjksMS45OSBjMC4wMiwwLjA2LDAuMDQsMC4xMSwwLjA2LDAuMTZjMC4xNywwLjUsMC4zMiwxLjAyLDAuNDUsMS41NGMwLjA5LDAuMzcsMC4xNiwwLjc1LDAuMjIsMS4xM2MwLjAyLDAuMTIsMC4wNCwwLjIzLDAuMDUsMC4zNSBDMzYuMjgsMzcuOTksMzYuMzMsMzguNywzNi4zMywzOS40MnoiPjwvcGF0aD48cGF0aCBmaWxsPSIjZmY5ODAwIiBkPSJNMzQuMjgsMzkuNDJ2MC4xYzAsMC4zNC0wLjAzLDAuNzctMC4wNiwxLjIzYy0wLjAzLDAuMzQtMC4wNiwwLjY5LTAuMDksMS4wMmMtMC4zMiwwLjA3LTAuNjUsMC4xMy0wLjk4LDAuMTYgaC0wLjAxQzMyLjc2LDQxLjk4LDMyLjM5LDQyLDMyLDQyaC0xLjc1bC0wLjM4LTAuMTFsLTEuOTctMC42bC0yLTAuNmwtNC42My0xLjM5bC0yLTAuNmMwLDAtMC44MywwLjMzLTIsMC43MmgtMC4wMSBjLTAuNDUsMC4xNS0wLjk0LDAuMzEtMS40NiwwLjQ3Yy0wLjY1LDAuMTktMS4zNCwwLjM4LTIuMDIsMC41M2MtMC43LDAuMTYtMS4zOSwwLjI4LTIuMDEsMC4zM2MtMC4xOSwwLjAyLTAuMzgsMC4wMy0wLjU1LDAuMDMgYy0wLjU2LTAuMzEtMS4xLTAuNjgtMS41OS0xLjA5Yy0wLjQzLTAuMzYtMC44My0wLjc1LTEuMi0xLjE4Yy0wLjI4LTAuMzItMC41My0wLjY1LTAuNzctMS4wMWMwLjA3LTAuNDUsMC4xNS0wLjg5LDAuMjctMS4zMiBjMC4zLTEuMTksMC43Ny0yLjMzLDEuMzktMy4zN2MwLjM0LTAuNTksMC43Mi0xLjE2LDEuMTYtMS42OWMwLjAxLTAuMDMsMC4wNC0wLjA2LDAuMDctMC4wOGMtMC4wMS0wLjAxLDAtMC4wMSwwLTAuMDEgYzAuMTMtMC4xNywwLjI3LTAuMzMsMC40MS0wLjQ4YzAtMC4wMSwwLTAuMDEsMC0wLjAxYzAuNDEtMC40NCwwLjgzLTAuODYsMS4yOS0xLjI1YzAuMTYtMC4xMywwLjMxLTAuMjYsMC40OC0wLjM5IGMwLjAzLTAuMDMsMC4wNi0wLjA1LDAuMS0wLjA4YzIuMjUtMS43Miw1LjA2LTIuNzYsOC4wOS0yLjc2YzMuNDQsMCw2LjU3LDEuMjksOC45NCwzLjQxYzEuMTQsMS4wMywyLjExLDIuMjYsMi44NCwzLjYzIGMwLjA2LDAuMSwwLjEyLDAuMjEsMC4xNywwLjMyYzAuMDksMC4xOCwwLjE4LDAuMzcsMC4yNiwwLjU3YzAuMzMsMC43MiwwLjU5LDEuNDgsMC43NywyLjI2YzAuMDIsMC4wOCwwLjA0LDAuMTYsMC4wNiwwLjI0IGMwLjA4LDAuMzcsMC4xNSwwLjc1LDAuMiwxLjEzQzM0LjI0LDM4LjIxLDM0LjI4LDM4LjgxLDM0LjI4LDM5LjQyeiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNmZmMxMDciIGQ9Ik0zMi4yMiwzOS40MmMwLDAuMi0wLjAxLDAuNDItMC4wMiwwLjY1Yy0wLjAyLDAuMzctMC4wNSwwLjc3LTAuMSwxLjE4Yy0wLjAyLDAuMjUtMC4wNiwwLjUtMC4xLDAuNzVoLTUuNDggbC0xLjA2LTAuMTdsLTQuMTQtMC42NmwtMC41OS0wLjA5bC0xLjM1LTAuMjJjLTAuNTksMC0xLjg3LDAuMjYtMy4yMiwwLjUxYy0wLjcxLDAuMTMtMS40MywwLjI3LTIuMDgsMC4zNiBjLTAuMDgsMC4wMS0wLjE2LDAuMDItMC4yMywwLjAzaC0wLjAxYy0wLjctMC4xNS0xLjM4LTAuMzgtMi4wMi0wLjY4Yy0wLjItMC4wOS0wLjQtMC4xOS0wLjYtMC4zYy0wLjU2LTAuMzEtMS4xLTAuNjgtMS41OS0xLjA5IGMtMC4wMS0wLjEyLTAuMDItMC4yMi0wLjAyLTAuMjdjMC0wLjI2LDAuMDEtMC41MSwwLjAzLTAuNzZjMC4wNC0wLjY0LDAuMTMtMS4yNiwwLjI3LTEuODZjMC4yMi0wLjkxLDAuNTQtMS43OSwwLjk3LTIuNiBjMC4wOC0wLjE3LDAuMTctMC4zNCwwLjI3LTAuNWMwLjA0LTAuMDgsMC4wOS0wLjE1LDAuMTMtMC4yM2MwLjE4LTAuMjksMC4zOC0wLjU3LDAuNTgtMC44NWMwLjQyLTAuNTUsMC44OS0xLjA3LDEuMzktMS41NCBjMC4wMSwwLDAuMDEsMCwwLjAxLDBjMC4wNC0wLjA0LDAuMDgtMC4wOCwwLjEyLTAuMTFjMC4wNS0wLjA0LDAuMDktMC4wOSwwLjE0LTAuMTJjMC4yLTAuMTgsMC40LTAuMzQsMC42MS0wLjQ5IGMwLTAuMDEsMC4wMS0wLjAxLDAuMDEtMC4wMWMxLjg5LTEuNDEsNC4yMy0yLjI0LDYuNzgtMi4yNGMxLjk4LDAsMy44MiwwLjUsNS40MywxLjM4aDAuMDFjMS4zOCwwLjc2LDIuNTgsMS43OSwzLjUzLDMuMDMgYzAuMzcsMC40OCwwLjcsMC45OSwwLjk4LDEuNTNoMC4wMWMwLjA1LDAuMSwwLjEsMC4yLDAuMTUsMC4zYzAuMywwLjU5LDAuNTQsMS4yMSwwLjcyLDEuODVoMC4wMWMwLjAxLDAuMDUsMC4wMywwLjEsMC4wNCwwLjE1IGMwLjEyLDAuNDMsMC4yMiwwLjg3LDAuMjksMS4zMmMwLjAxLDAuMDksMC4wMiwwLjE5LDAuMDMsMC4yOEMzMi4xOSwzOC40MywzMi4yMiwzOC45MiwzMi4yMiwzOS40MnoiPjwvcGF0aD48cGF0aCBmaWxsPSIjZmZkNTRmIiBkPSJNMzAuMTcsMzkuMzFjMCwwLjE2LDAsMC4zMy0wLjAyLDAuNDl2MC4wMWMwLDAuMDEsMCwwLjAxLDAsMC4wMWMtMC4wMiwwLjcyLTAuMTIsMS40My0wLjI4LDIuMDcgYzAsMC4wNC0wLjAxLDAuMDctMC4wMywwLjExaC00LjY3bC0zLjg1LTAuODNsLTAuNTEtMC4xMWwtMC4wOCwwLjAybC00LjI3LDAuODhMMTYuMjcsNDJIMTZjLTAuNjQsMC0xLjI3LTAuMDYtMS44OC0wLjE4IGMtMC4wOS0wLjAyLTAuMTgtMC4wNC0wLjI3LTAuMDZoLTAuMDFjLTAuNy0wLjE1LTEuMzgtMC4zOC0yLjAyLTAuNjhjLTAuMDItMC4xMS0wLjA0LTAuMjItMC4wNS0wLjMzIGMtMC4wNy0wLjQzLTAuMS0wLjg4LTAuMS0xLjMzYzAtMC4xNywwLTAuMzQsMC4wMS0wLjUxYzAuMDMtMC41NCwwLjExLTEuMDcsMC4yMy0xLjU4YzAuMDgtMC4zOCwwLjE5LTAuNzUsMC4zMi0xLjEgYzAuMTEtMC4zMSwwLjI0LTAuNjEsMC4zOC0wLjljMC4xMi0wLjI1LDAuMjYtMC40OSwwLjQtMC43M2MwLjE0LTAuMjMsMC4yOS0wLjQ1LDAuNDUtMC42N2MwLjQtMC41NSwwLjg3LTEuMDYsMS4zOS0xLjUxIGMwLjMtMC4yNiwwLjYzLTAuNTEsMC45Ny0wLjczYzEuNDYtMC45NiwzLjIxLTEuNTIsNS4xLTEuNTJjMC4zNywwLDAuNzMsMC4wMiwxLjA4LDAuMDdoMC4wMmMxLjA3LDAuMTIsMi4wNywwLjQyLDIuOTksMC44NyBjMC4wMSwwLDAuMDEsMCwwLjAxLDBjMS40NSwwLjcxLDIuNjgsMS43OCwzLjU4LDMuMWMwLjE1LDAuMjIsMC4zLDAuNDYsMC40MywwLjdjMC4xMSwwLjE5LDAuMjEsMC4zOSwwLjMsMC41OSBjMC4xNCwwLjMxLDAuMjcsMC42NCwwLjM4LDAuOTdoMC4wMWMwLjExLDAuMzcsMC4yMSwwLjc0LDAuMjgsMS4xM3YwLjAxQzMwLjExLDM4LjE2LDMwLjE3LDM4LjczLDMwLjE3LDM5LjMxeiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNmZmUwODIiIGQ9Ik0yOC4xMSwzOS41MnYwLjAzYzAsMC41OS0wLjA3LDEuMTctMC4yMSwxLjc0Yy0wLjA1LDAuMjQtMC4xMiwwLjQ4LTAuMjEsMC43MWgtNC40OGwtMi4yOS0wLjYzTDE4LjYzLDQySDE2IGMtMC42NCwwLTEuMjctMC4wNi0xLjg4LTAuMThjLTAuMDItMC4wMy0wLjAzLTAuMDYtMC4wNC0wLjA5Yy0wLjE0LTAuNDMtMC4yNS0wLjg2LTAuMy0xLjMxYy0wLjA0LTAuMjktMC4wNi0wLjU5LTAuMDYtMC45IGMwLTAuMTIsMC0wLjI1LDAuMDItMC4zN2MwLjAxLTAuNDcsMC4wOC0wLjkzLDAuMi0xLjM3YzAuMDYtMC4zLDAuMTUtMC41OSwwLjI3LTAuODdjMC4wNC0wLjE0LDAuMS0wLjI3LDAuMTctMC40IGMwLjE1LTAuMzQsMC4zMy0wLjY3LDAuNTMtMC45OWMwLjIyLTAuMzIsMC40Ni0wLjYyLDAuNzMtMC45YzAuMzItMC4zNiwwLjY4LTAuNjksMS4wOS0wLjk2YzAuNy0wLjUxLDEuNS0wLjg5LDIuMzctMS4xIGMwLjU4LTAuMTYsMS4xOS0wLjI0LDEuODItMC4yNGMyLDAsMy43OSwwLjgsNS4wOSwyLjA5YzAuMDUsMC4wNSwwLjExLDAuMTEsMC4xNiwwLjE4aDAuMDFjMC4xNCwwLjE1LDAuMjcsMC4zLDAuNCwwLjQ3IGMwLjM3LDAuNDcsMC42OCwwLjk4LDAuOTIsMS41NGMwLjEyLDAuMjYsMC4yMiwwLjUzLDAuMywwLjgxYzAuMDEsMC4wNCwwLjAyLDAuMDcsMC4wMywwLjExYzAuMTQsMC40OSwwLjIzLDEsMC4yNSwxLjUzIEMyOC4xLDM5LjIsMjguMTEsMzkuMzYsMjguMTEsMzkuNTJ6Ij48L3BhdGg+PHBhdGggZmlsbD0iI2ZmZWNiMyIgZD0iTTI2LjA2LDM5LjUyYzAsMC40MS0wLjA1LDAuOC0wLjE2LDEuMTdjLTAuMSwwLjQtMC4yNSwwLjc4LTAuNDQsMS4xNGMtMC4wMywwLjA2LTAuMSwwLjE3LTAuMSwwLjE3aC04Ljg4IGMtMC4wMS0wLjAxLTAuMDItMC4wMy0wLjAyLTAuMDRjLTAuMTItMC4xOS0wLjIyLTAuMzgtMC4zLTAuNTljLTAuMi0wLjQ2LTAuMzItMC45Ni0wLjM2LTEuNDhjLTAuMDItMC4xMi0wLjAyLTAuMjUtMC4wMi0wLjM3IGMwLTAuMDYsMC0wLjEzLDAuMDEtMC4xOWMwLjAxLTAuNDQsMC4wNy0wLjg2LDAuMTktMS4yNWMwLjEtMC4zNiwwLjIzLTAuNjksMC40LTEuMDFjMCwwLDAuMDEtMC4wMSwwLjAxLTAuMDIgYzAuMTItMC4yMSwwLjI1LTAuNDIsMC40LTAuNjJjMC40OS0wLjY2LDEuMTQtMS4yLDEuODktMS41NWMwLjAxLDAsMC4wMSwwLDAuMDEsMGMwLjI0LTAuMTIsMC40OS0wLjIyLDAuNzUtMC4yOWMwLDAsMCwwLDAuMDEsMCBjMC40Ni0wLjE0LDAuOTYtMC4yMSwxLjQ3LTAuMjFjMC41OSwwLDEuMTYsMC4wOSwxLjY4LDAuMjhjMC4xOSwwLjA1LDAuMzcsMC4xMywwLjU1LDAuMjJjMCwwLDAsMCwwLjAxLDAgYzAuODYsMC40MSwxLjU5LDEuMDUsMi4wOSwxLjg1YzAuMSwwLjE1LDAuMTksMC4zMSwwLjI3LDAuNDhjMC4wNCwwLjA3LDAuMDgsMC4xNSwwLjExLDAuMjJjMC4yMywwLjUyLDAuMzcsMS4wOSwwLjQxLDEuNjkgYzAuMDEsMC4wNSwwLjAxLDAuMSwwLjAxLDAuMTZDMjYuMDYsMzkuMzYsMjYuMDYsMzkuNDQsMjYuMDYsMzkuNTJ6Ij48L3BhdGg+PGc+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIyIiBkPSJNMzAsMTFIMThjLTMuOSwwLTcsMy4xLTcsN3YxMmMwLDMuOSwzLjEsNyw3LDdoMTJjMy45LDAsNy0zLjEsNy03VjE4QzM3LDE0LjEsMzMuOSwxMSwzMCwxMXoiPjwvcGF0aD48Y2lyY2xlIGN4PSIzMSIgY3k9IjE2IiByPSIxIiBmaWxsPSIjZmZmIj48L2NpcmNsZT48L2c+PGc+PGNpcmNsZSBjeD0iMjQiIGN5PSIyNCIgcj0iNiIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLXdpZHRoPSIyIj48L2NpcmNsZT48L2c+PC9zdmc+"/></a>
      <a class="redesocial4" href="https://www.youtube.com/channel/UCIBUmFvG1ni6XisUqG7wr7g" rel="external noopener nofollow" target="_blank" title="YouTube"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNDgiIGhlaWdodD0iNDgiCnZpZXdCb3g9IjAgMCA0OCA0OCIKc3R5bGU9IiBmaWxsOiMwMDAwMDA7Ij48cGF0aCBmaWxsPSIjRkYzRDAwIiBkPSJNNDMuMiwzMy45Yy0wLjQsMi4xLTIuMSwzLjctNC4yLDRjLTMuMywwLjUtOC44LDEuMS0xNSwxLjFjLTYuMSwwLTExLjYtMC42LTE1LTEuMWMtMi4xLTAuMy0zLjgtMS45LTQuMi00QzQuNCwzMS42LDQsMjguMiw0LDI0YzAtNC4yLDAuNC03LjYsMC44LTkuOWMwLjQtMi4xLDIuMS0zLjcsNC4yLTRDMTIuMyw5LjYsMTcuOCw5LDI0LDljNi4yLDAsMTEuNiwwLjYsMTUsMS4xYzIuMSwwLjMsMy44LDEuOSw0LjIsNGMwLjQsMi4zLDAuOSw1LjcsMC45LDkuOUM0NCwyOC4yLDQzLjYsMzEuNiw0My4yLDMzLjl6Ij48L3BhdGg+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTIwIDMxTDIwIDE3IDMyIDI0eiI+PC9wYXRoPjwvc3ZnPg=="/></a>
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
