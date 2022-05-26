@extends('layouts/fullLayoutMaster')

@section('title', 'Login')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-basic px-2">
  <div class="auth-inner my-2">
    <!-- Login basic -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="#" class="brand-logo">
<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 521.58 150.21"><defs><style>.cls-1{fill:#ed2d35;}.cls-1,.cls-2,.cls-4{fill-rule:evenodd;}.cls-2{fill:#fff;}.cls-3{fill:none;}.cls-4{fill:#3f77b5;}.cls-5,.cls-6{fill:#353132;}.cls-6{font-size:35.22px;font-family:Nunito-ExtraBold, Nunito;font-weight:800;}.cls-7{letter-spacing:-0.01em;}.cls-8{letter-spacing:0em;}.cls-9{letter-spacing:-0.01em;}</style></defs><title>logo diario</title><path class="cls-1" d="M256.61,91l8.83,14.25H.15V91Z"/><polygon class="cls-1" points="353.81 105.28 441.51 105.28 432.69 91.04 344.99 91.04 353.81 105.28"/><polygon class="cls-2" points="89.53 90.57 99.38 105.74 63.8 105.74 53.95 90.57 89.53 90.57"/><polygon class="cls-3" points="89.53 90.57 99.38 105.74 63.8 105.74 53.95 90.57 89.53 90.57"/><polygon class="cls-4" points="78.05 96.33 76.65 92.02 75.26 96.33 70.73 96.33 74.39 98.98 72.98 103.31 76.66 100.63 80.33 103.31 78.92 98.98 82.58 96.33 78.05 96.33"/><polygon class="cls-1" points="344.99 91.03 353.81 105.28 265.44 105.28 256.62 91.04 344.99 91.03"/><polygon class="cls-1" points="442.31 105.28 521.59 105.28 521.59 91.04 432.69 91.03 441.51 105.28 442.31 105.28"/><path class="cls-5" d="M0,69.4H21c19.81,0,29.17-5,29.17-31.28,0-25.81-9.53-31.21-29.43-31.21H0ZM16.71,55V22.09h5.13c7.08,0,11.38.42,11.38,16.11S28.76,55,22.51,55Zm36,14.42H68.81V20.91H52.7Zm-.09-51.86H68.89v-13H52.61Zm33.31-.84H99.5L112.31,0H94.6Zm2,53.28c7.26,0,10.46-1.51,12.9-4.3,1.86,3.46,4.9,4,11.14,4,1.52,0,3.2-.09,5-.25V55.48c-2.85,0-3-.59-3-3.11V35.93c0-12.07-5-16.12-18.63-16.12-9.87,0-16.27,1.7-20.84,4.14l6.42,12.9a29.6,29.6,0,0,1,12.57-2.53c3.61,0,4.72.92,4.88,3.88H96.88C79,38.2,72.09,41.49,72.09,54.73,72.09,63.66,74.78,70,87.94,70Zm3.88-13.07c-3.88,0-4.47-1.6-4.47-4,0-3.37,1.68-5.15,9.62-5.15h1.34V51.1C98.31,55.66,96.28,56.91,91.82,56.91ZM121.43,69.4h16.18V44.94c0-5.65.93-9.19,11.54-9.19V20.49c-7.92,0-11.21,1.76-13.57,4.55l-1.35-4.21-12.8,1Zm31.94,0h16.11V20.91H153.37Zm-.08-51.86h16.27v-13H153.29ZM197,70.16c17.88,0,22.6-8.94,22.6-25.13,0-15.52-4.72-25-22.6-25-17.7,0-22.67,9.35-22.67,25C174.29,61,179.43,70.16,197,70.16Zm0-14c-5.64,0-6.4-3.28-6.4-10.62S191.32,35,197,35s6.41,3.21,6.41,10.54S202.69,56.15,197,56.15ZM253.12,70c7.34,0,11.81-1.17,14.59-4.2l1.18,4.13,12.9-1V4.55h-16.1V23c-2.54-2.36-5.75-3-11.81-3-14.59,0-17,11.38-17,25C236.85,58.27,238.7,70,253.12,70Zm5.82-13.91c-5.06,0-5.82-2.86-5.82-10.79s1-10.38,5.82-10.38c5.73,0,6.75,2.79,6.75,10.38C265.69,53,264.43,56.07,258.94,56.07Zm49.92,14.09c17.87,0,22.59-8.94,22.59-25.13,0-15.52-4.72-25-22.59-25-17.71,0-22.69,9.35-22.69,25C286.17,61,291.32,70.16,308.86,70.16Zm0-14c-5.66,0-6.41-3.28-6.41-10.62S303.2,35,308.86,35s6.4,3.21,6.4,10.54S314.59,56.15,308.86,56.15ZM351.44,69.4h16.44V50.93h9.28c16.77,0,22.25-10.2,22.25-22.76,0-12.74-5.56-21.26-21.92-21.26H351.44Zm16.44-32.64V21.42h9c4.55,0,6.16,2.36,6.16,7.76,0,5.22-1.61,7.58-6.16,7.58ZM416.79,70c7.24,0,10.45-1.51,12.89-4.3,1.86,3.46,4.9,4,11.13,4,1.53,0,3.2-.09,5-.25V55.48c-2.86,0-3-.59-3-3.11V35.93c0-12.07-5-16.12-18.63-16.12-9.87,0-16.28,1.7-20.84,4.14l6.42,12.9a29.55,29.55,0,0,1,12.56-2.53c3.62,0,4.73.92,4.9,3.88h-1.44c-17.88,0-24.79,3.29-24.79,16.53C400.93,63.66,403.63,70,416.79,70Zm3.88-13.07c-3.88,0-4.48-1.6-4.48-4,0-3.37,1.68-5.15,9.61-5.15h1.36V51.1C427.16,55.66,425.12,56.91,420.67,56.91ZM449,69.4h16.18V44.94c0-5.65.94-9.19,11.55-9.19V20.49c-7.93,0-11.21,1.76-13.57,4.55l-1.35-4.21-12.81,1Zm41.56-52.7h13.58L517,0H499.24Zm2,53.28c7.25,0,10.45-1.51,12.91-4.3,1.84,3.46,4.88,4,11.12,4,1.52,0,3.21-.09,5-.25V55.48c-2.85,0-3-.59-3-3.11V35.93c0-12.07-5-16.12-18.63-16.12-9.86,0-16.27,1.7-20.83,4.14l6.4,12.9a29.67,29.67,0,0,1,12.57-2.53c3.63,0,4.72.92,4.9,3.88h-1.45c-17.86,0-24.78,3.29-24.78,16.53C476.73,63.66,479.42,70,492.58,70Zm3.88-13.07c-3.88,0-4.46-1.6-4.46-4,0-3.37,1.68-5.15,9.61-5.15H503V51.1C503,55.66,500.93,56.91,496.46,56.91Z"/><text class="cls-6" transform="translate(132.8 140.52) scale(0.86 1)"><tspan class="cls-7">P</tspan><tspan class="cls-8" x="23.18" y="0">ublicação </tspan><tspan class="cls-9" x="188.12" y="0">L</tspan><tspan x="207.77" y="0">egal</tspan></text></svg>
          <h2 class="brand-text text-primary ms-1"></h2>
        </a>

        @if(session('message'))
          <div class="alert alert-danger role='alert'">
            <h4 class="alert-heading">{{ session('message') }}</h4>
          </div>
        @endif

        <form class="auth-login-form mt-2 needs-validation" action="{{ route('autenticacao') }}" method="POST" novalidate>
          @csrf

          <div class="mb-1">
            <label for="email" class="form-label">Email</label>
            <input
              type="text"
              class="form-control"
              id="email"
              name="email"
              placeholder="joao@exemplo.com"
              aria-describedby="email"
              tabindex="1"
              autofocus
            />
          </div>

          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="password">Password</label>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input
                type="password"
                class="form-control form-control-merge"
                id="password"
                name="password"
                tabindex="2"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
              />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100" tabindex="4">Entrar</button>
        </form>

      </div>
    </div>
    <!-- /Login basic -->
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
@endsection
