
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
          <h4 class="card-title">{{ $breadcrumbs[1]['name'] }}</h4>
          
          <form action="{{ route('update-tipo', $tipo->id) }}" method="POST" class="needs-validation" novalidate>
            
            @csrf
            
            <div class="mb-1">
              <label class="form-label" for="basic-addon-name">Descricao <strong class="text-danger">(Obrigatório)</strong></label>

              <input
                type="text"
                name="descricao"
                value="{{ $tipo->descricao }}"
                id="basic-addon-name"
                class="form-control"
                placeholder="Informe Descrição do Tipo"
                aria-label="Tipo"
                aria-describedby="basic-addon-name"
                required
              />
              <div class="invalid-feedback">Por favor, informe a Descrição do Tipo.</div>
            </div>

            <div class="mb-1">
              <label class="form-label" for="select2-basic">Situação <strong class="text-danger">(Obrigatório)</strong></label>
              <select class="select2 form-select" name="inativo" id="inativo" required>
                  <option value="">Selecione uma opção</option>
                  <option value="2" @if (old('inativo') == 2) selected @else @if ($tipo->inativo == 2) selected @endif @endif>Ativo</option>
                  <option value="1" @if (old('inativo') == 1) selected @else @if ($tipo->inativo == 1) selected @endif @endif>Inativo</option>
              </select>
              <div class="invalid-feedback">Por favor, informe a Situação.</div>
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="{{ route('index-tipo') }}" class="btn btn-danger">Cancelar</a>
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
