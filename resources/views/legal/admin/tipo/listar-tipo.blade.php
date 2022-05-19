
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

      <div class="card-body">
        <div class="row">
          <form action="" method="POST">
            @csrf

            <div class="col-xl-4 col-md-6 col-12">
              <div class="mb-1">
                <label class="form-label" for="basicInput">Descrição</label>
                <input 
                  type="text" 
                  class="form-control" 
                  name="descricao"
                  
                  @if (isset($filtros['descricao']))
                    value = {{ $filtros['descricao'] }}
                  @endif

                  @if (old('descricao'))
                    value="{{ old('descricao') }}"  
                  @endif
                  
                  id="basicInput" 
                  placeholder="Informe Descricao" 
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
              <th>descricao</th>
              <th>Situação</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>

            @if (isset($tipos))
                @foreach($tipos as $tipo)
                <tr class="table-default">
                  <td>{{ $tipo->descricao }}</td>
                  <td>
                    @if ($tipo->inativo == 2)
                      <span class="badge rounded-pill badge-light-primary me-1">Ativo</span>
                    @else
                      <span class="badge rounded-pill badge-light-warning me-1">Inativo</span>  
                    @endif
                  </td>
                  <td>
                    <div class="icon-wrapper">
                      <a href="{{ route('edit-tipo', $tipo->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                      </a>

                      @if (Auth::user()->tipo == 1)
                        <a href="{{ route('destroy-tipo', $tipo->id) }}" onclick='return confirm("Deseja mesmo excluir a tipo {{ $tipo->descricao }}");'>
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
  @if (!empty($filtros)) {{$tipos->appends($filtros)->links()}} @else {{$tipos->links()}} @endif
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
