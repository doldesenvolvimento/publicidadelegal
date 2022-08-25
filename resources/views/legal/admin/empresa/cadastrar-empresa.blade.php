
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
          <form action="{{ route('store-empresa') }}" method="POST" class="needs-validation" novalidate>
            
            @csrf
            
            <div class="mb-1">
              <label class="form-label" for="basic-addon-name">CPF/CNPJ <strong class="text-danger">(Obrigatório)</strong></label>

              <input
                type="number"
                name="cnpj"
                value="{{ old('cnpj') }}"
                id="basic-addon-name"
                class="form-control"
                placeholder="Informe CPF/CNPJ da Empresa (somente números)"
                aria-label="CPF/CNPJ"
                aria-describedby="basic-addon-name"
                required
              />
              <div class="invalid-feedback">Por favor, informe CPF/CNPJ da Empresa (somente números).</div>
            </div>
            
            <div class="mb-1">
              <label class="form-label" for="basic-addon-name">Nome <strong class="text-danger">(Obrigatório)</strong></label>

              <input
                type="text"
                name="nome"
                value="{{ old('nome') }}"
                id="basic-addon-name"
                class="form-control"
                placeholder="Informe Nome da Empresa"
                aria-label="Nome"
                aria-describedby="basic-addon-name"
                required
              />
              <div class="invalid-feedback">Por favor, informe o Nome da Empresa.</div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route('index-empresa') }}" class="btn btn-danger">Cancelar</a>
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
