
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
          <form action="{{ route('store-usuario') }}" method="POST" class="needs-validation" novalidate>
            
            @csrf
            
            <div class="mb-1">
              <label class="form-label" for="basic-addon-name">Nome <strong class="text-danger">(Obrigatório)</strong></label>

              <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                id="basic-addon-name"
                class="form-control"
                placeholder="Informe Nome do Usuário"
                aria-label="Nome"
                aria-describedby="basic-addon-name"
                required
              />
              <div class="invalid-feedback">Por favor, informe o Nome do Usuário.</div>
            </div>

            <div class="mb-1">
              <label class="form-label" for="basic-addon-name">E-mail <strong class="text-danger">(Obrigatório)</strong></label>

              <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                id="basic-addon-name"
                class="form-control"
                placeholder="Informe e-mail do usuario"
                aria-label="E-mail"
                aria-describedby="basic-addon-name"
                required
              />
              <div class="invalid-feedback">Por favor, informe o e-mail do Usuário.</div>
            </div>

            <div class="mb-1">
              <label class="form-label" for="basic-addon-name">Senha <strong class="text-danger">(Obrigatório)</strong></label>

              <input
                type="password"
                name="password"
                id="basic-addon-name"
                class="form-control"
                placeholder="Informe a senha do Usuário"
                aria-label="Senha"
                aria-describedby="basic-addon-name"
                required
              />
              <div class="invalid-feedback">Por favor, informe a senha do Usuário.</div>
            </div>

            <div class="mb-1">
              <label class="form-label" for="select2-basic">Tipo <strong class="text-danger">(Obrigatório)</strong></label>
              <select class="select2 form-select" name="tipo" id="tipo">
                  <option value="">Selecione uma opção</option>
                  <option value="1" @if (old('tipo') == 1) selected @endif>Administrador</option>
                  <option value="2" @if (old('tipo') == 2) selected @endif>Operador</option>
              </select>
              <div class="invalid-feedback">Por favor, informe o Tipo de Acesso.</div>
            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route('index-usuario') }}" class="btn btn-danger">Cancelar</a>
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
