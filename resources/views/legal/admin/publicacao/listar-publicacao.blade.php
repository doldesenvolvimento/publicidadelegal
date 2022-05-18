
@extends('layouts/contentLayoutMaster')

@section('title', $breadcrumbs[1]['name'])

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')

<!-- Contextual classes start -->
<div class="row" id="table-contextual">
  <div class="col-12">
    <div class="card">
      
      @if ($errors->any())
        <div class="alert alert-danger role='alert'">
          <h4 class="alert-heading">Erros</h4>
          <div class="alert-body">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>    
      @endif

      @if(session('success'))
        <div class="alert alert-success role='alert'">
          <h4 class="alert-heading">{{ session('success') }}</h4>
        </div>
      @endif

      <div class="card-header">
        <h4 class="card-title">{{ $breadcrumbs[1]['name'] }}</h4>
      </div>
      
      <div class="card-body">
        <p class="card-text">
          Validadas pelo
          <a href="https://verificador.iti.gov.br/" target="_blank">Instituto Nacional de Tecnologia da Informação (ITI).</a>
        </p>
        <div class="row">
          <form action="" method="POST">
            @csrf

            <div class="col-xl-4 col-md-6 col-12">
              <div class="mb-1">
                <label class="form-label" for="select2-basic">Empresa</label>
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
            </div>

            <div class="col-xl-4 col-md-6 col-12">
              <div class="mb-1">
                <label class="form-label" for="select2-basic">Tipo</label>
                <select class="select2 form-select" name="tipo_id" id="tipo_id">
                    <option value="">Selecione uma opção</option>

                    @if (isset($tipos))
                      @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}"
                          @if (isset($filtros['tipo_id']) && $filtros['tipo_id'] == $tipo->id)
                            selected
                          @else
                            @if (old('tipo_id') && old('tipo_id') == $tipo->id)
                              selected
                            @endif
                          @endif
                        >{{ $tipo->descricao }}</option>
                      @endforeach    
                    @endif

                </select>
              </div>
            </div>

            <div class="col-xl-4 col-md-6 col-12">
              <div class="mb-1">
                <label class="form-label" for="basicInput">Início</label>
                <input 
                  type="date" 
                  class="form-control" 
                  name="inicio"
                  
                  @if (isset($filtros['inicio']))
                    value = {{ $filtros['inicio'] }}
                  @endif

                  @if (old('inicio'))
                    value="{{ old('inicio') }}"  
                  @endif
                  
                  id="basicInput" 
                  placeholder="Data de Início"
                />
              </div>
            </div>

            <div class="col-xl-4 col-md-6 col-12">
              <div class="mb-1">
                <label class="form-label" for="basicInput">Fim</label>
                <input 
                  type="date" 
                  class="form-control" 
                  name="fim"
                  
                  @if (isset($filtros['fim']))
                    value = {{ $filtros['fim'] }}
                  @endif

                  @if (old('fim'))
                    value="{{ old('fim') }}"  
                  @endif
                  
                  id="basicInput" 
                  placeholder="Data de Fim" 
                />
              </div>
            </div>

            <div class="col-xl-4 col-md-6 col-12">
              <div class="mb-1">
                <label class="form-label" for="select2-basic">Situação</label>
                <select class="select2 form-select" name="inativo" id="inativo">
                    <option value="">Selecione uma opção</option>
                    <option value="2" @if (isset($filtros['inativo']) && $filtros['inativo'] == 2) selected @else @if (old('inativo') == 2) selected @endif @endif>Ativo</option>
                    <option value="1" @if (isset($filtros['inativo']) && $filtros['inativo'] == 1) selected @else @if (old('inativo') == 1) selected @endif @endif>Inativo</option>
                </select>
              </div>
            </div>

            <div class="col-xl-4 col-md-6 col-12">
              <div class="mb-1">
                <button type="submit" name="pesquisar" class="btn btn-primary">Pesquisar</button>
              </div>
            </div>

          </form>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Empresa</th>
              <th>Tipo</th>
              <th>Data</th>
              <th>Baixar</th>
              <th>Site</th>
              <th>Situação</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>

            @if (isset($publicacoes))
                @foreach($publicacoes as $publicacao)
                <tr class="table-default">
                  <td>
                    <span class="fw-bold">{{ $publicacao->empresa->nome }}</span>
                  </td>
                  <td>{{ $publicacao->tipo->descricao }}</td>
                  <td>
                    {{ \Carbon\Carbon::parse($publicacao->data)->format("d/m/Y") }}
                  </td>
                  <td>
                    <div class="icon-wrapper">
                      <a href="{{ route('download-publicacao', str_replace('/', '_', $publicacao->anexo)) }}"target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg>
                      </a>
                    </div>
                  </td>
                  <td><a href="{{ $publicacao->url }}" class="btn btn-outline-success" target="_blank">Visualizar</a></td>
                  <td>
                    @if ($publicacao->inativo == 2)
                      <span class="badge rounded-pill badge-light-primary me-1">Ativo</span>
                    @else
                      <span class="badge rounded-pill badge-light-warning me-1">Inativo</span>  
                    @endif
                  </td>
                  <td>
                    <div class="icon-wrapper">
                      <a href="{{ route('edit-publicacao', $publicacao->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                      </a>
                      
                      @if (Auth::user()->tipo == 1)
                        <a href="{{ route('destroy-publicacao', $publicacao->id) }}" onclick='return confirm("Deseja mesmo excluir a publicação de {{ $publicacao->empresa->nome }} referente a data {{ \Carbon\Carbon::parse($publicacao->data)->format("d/m/Y") }}");'>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>
                      @endif

                    </div>
                  </td>
                </tr>
                @endforeach
            @endif

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Contextual classes end -->

<div>
  @if (!empty($filtros)) {{$publicacoes->appends($filtros)->links()}} @else {{$publicacoes->links()}} @endif
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
