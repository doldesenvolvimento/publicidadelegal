
@extends('layouts/contentLayoutMaster')

@section('title', $breadcrumbs[1]['name'])

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

@section('content')
<!-- Validation -->
<section class="bs-validation">
  <div class="row">
    <!-- Bootstrap Validation -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">

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

        </div>

        <div class="card-body">
          <form action="{{ route('store-publicacao') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            
            @csrf

            <div class="mb-1">
                <label class="form-label" for="fp-default">Data <strong class="text-danger">(Obrigatório)</strong></label>
                <input 
                    type="date" 
                    id="fp-default" 
                    name="data" 
                    value="{{ old('data') }}"
                    class="form-control flatpickr-basic" 
                    placeholder="AAAA/MM/DD" 
                    required
                />
                <div class="invalid-feedback">Por favor, informe Data</div>
            </div>
            
            <div class="mb-1">
                <label class="form-label" for="basic-addon-name">Empresa <strong class="text-danger">(Obrigatório)</strong></label>
                <select class="form-control select2" name="empresa_id" id="empresa_id" required>
                  <option value="">Selecione uma Opção</option>
                  @if (isset($empresas))
                      @foreach ($empresas as $empresa)
                        <option value="{{$empresa->id}}" @if ($empresa->id == old('empresa_id')) selected @endif>{{$empresa->nome}}</option>    
                      @endforeach
                  @endif
                </select>
                <div class="invalid-feedback">Por favor, informe uma Empresa</div>
            </div>

            <div class="mb-1">
                <label class="form-label" for="basic-addon-name">Tipo <strong class="text-danger">(Obrigatório)</strong></label>
                <select class="form-control select2" name="tipo_id" id="tipo_id" required>
                  <option value="">Selecione uma Opção</option>
                  @if (isset($tipos))
                      @foreach ($tipos as $tipo)
                        <option value="{{$tipo->id}}" @if ($tipo->id == old('tipo_id')) selected @endif>{{$tipo->descricao}}</option>    
                      @endforeach
                  @endif
                </select>
                <div class="invalid-feedback">Por favor, informe um Tipo</div>
            </div>

            <div class="mb-1">
              <label class="form-label" for="basic-addon-name">Url do Arquivo E.E <strong class="text-danger">(Obrigatório)</strong></label>

              <input
                type="url"
                name="url"
                value="{{ old('url') }}"
                id="basic-addon-name"
                class="form-control"
                placeholder="Url da Publicação no Portal da Edição Eletrônica"
                pattern="https://dol.com.br/digital/.*"
                aria-label="Url"
                aria-describedby="basic-addon-name"
                required
              />
              <div class="invalid-feedback">Por favor, informe Url do Arquivo na Edição Eletrônica.</div>
            </div>

            <div class="mb-1">
                <label for="anexo" class="form-label">Arquivo <strong class="text-danger">(Obrigatório)</strong> <p class="fst-italic">
                Somente será aceito Arquivo no formato PDF    
                </p></label>
                <input 
                    class="form-control" 
                    name="anexo" 
                    type="file" 
                    id="anexo"
                    required 
                />
                <div class="invalid-feedback">Por favor, informe o Arquivo.</div>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route('index-publicacao') }}" class="btn btn-danger">Cancelar</a>
          </form>
        </div>
      </div>
    </div>
    <!-- /Bootstrap Validation -->

  </div>
</section>
<!-- /Validation -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>
@endsection
