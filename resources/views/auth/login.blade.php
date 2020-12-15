@extends('layouts.app', [
'namePage' => 'Login page',
'class' => 'login-page sidebar-mini ',
'activePage' => 'login',
'backgroundImage' => asset('assets') . "/img/background.png",
])

@section('content')
<div class="col-md-3 offset-md-9 fixed-top mt-3" style="z-index: 9999;">
  @include('layouts.messages.master-message')
</div>
<div class="content" style="padding-bottom: 0!important; padding-top: 0!important;">
  {{-- <div class="container"> --}}
    <div class="col-md-4 ml-auto mr-auto">
      <form autocomplete="off" role="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card card-login card-plain">
          <div class="card-header ">
            <div class="logo-container">
              <img src="{{ asset('assets/img/logo.png') }}" alt="">
            </div>
          </div>
          <div class="card-body ">
            <div class="input-group no-border form-control-lg {{ $errors->has('username') ? ' has-danger' : '' }}">
              <span class="input-group-prepend">
                <div class="input-group-text">
                  <i class="now-ui-icons users_circle-08"></i>
                </div>
              </span>
              <input class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" autocomplete="off" placeholder="{{ __('Username') }}" type="text" name="username" value="{{ old('username') }}" required autofocus>
            </div>
            @if ($errors->has('username'))
            <span class="invalid-feedback" style="display: block;" role="alert">
              <strong>{{ $errors->first('username') }}</strong>
            </span>
            @endif
            <div class="input-group no-border form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="now-ui-icons objects_key-25"></i></i>
                </div>
              </div>
              <input placeholder="Password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Senha') }}" type="password" value="" required>
            </div>
            @if ($errors->has('password'))
            <span class="invalid-feedback" style="display: block;" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>
          <div class="card-footer ">
            <button  type = "submit" class="btn btn-primary btn-round btn-lg btn-block mb-3" style="background: #016164;">{{ __('Acessar') }}</button>
            {{-- <div class="pull-left">
              <h6>
                <a href="{{ route('register') }}" class="link footer-link">{{ __('Create Account') }}</a>
              </h6>
            </div> --}}
            <div class="form-group row">
              <div class="col-md-12">
                <div class="form-check text-center">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="opacity: 100; visibility: inherit">

                  <label class="form-check-label" for="remember" style="padding-left: 5px">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  {{-- </div> --}}
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    demo.checkFullPageBackgroundImage();
  });
</script>
@endpush
