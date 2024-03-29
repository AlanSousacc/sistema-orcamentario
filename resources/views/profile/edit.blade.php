@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Perfil de Usuário',
'activePage' => 'profile',
'activeNav' => '',
])
@section('content')
<div class="col-sm-12 fixed-bottom mt-3" style="z-index: 9999;">
  @include('alerts.success')
</div>
{{-- @section('content') --}}
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h5 class="title">{{__(" Editar Meu Perfil")}}</h5>
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
          enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="row">
          </div>
          <div class="row">
            <div class="col-md-7 pr-1">
              <div class="form-group">
                <label>{{__(" Nome Completo")}}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
                @include('alerts.feedback', ['field' => 'name'])
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 pr-1">
              <div class="form-group">
                <label for="username">{{__(" Username")}}</label>
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username', auth()->user()->username) }}">
                @include('alerts.feedback', ['field' => 'username'])
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <button type="submit" class="btn btn-primary btn-round w-100" style="background: #016164">{{__('Salvar Perfil')}}</button>
          </div>
          <hr class="half-rule"/>
        </form>
      </div>
      <div class="card-header">
        <h5 class="title">{{__("Senha")}}</h5>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
          @csrf
          @method('put')
          @include('alerts.success', ['key' => 'password_status'])
          <div class="row">
            <div class="col-md-7 pr-1">
              <div class="form-group ">
                <label>{{__(" Senha Atual")}}</label>
                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="old_password" placeholder="{{ __('Senha Atual') }}" type="password"  required>
                @include('alerts.feedback', ['field' => 'old_password'])
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 pr-1">
              <div class="form-group ">
                <label>{{__(" Nova Senha")}}</label>
                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Preencha a nova senha') }}" type="password" name="password" required>
                @include('alerts.feedback', ['field' => 'password'])
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 pr-1">
              <div class="form-group ">
                <label>{{__(" Confirmação de Senha")}}</label>
                <input class="form-control" placeholder="{{ __('Informe a senha digitada anteriormente') }}" type="password" name="password_confirmation" required>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <button type="submit" class="btn btn-primary btn-round w-100" style="background: #016164">{{__('Alterar Senha')}}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-user">
      <div class="image">
        <img src="{{asset('assets')}}/img/background.png" alt="...">
      </div>
      <div class="card-body">
        <div class="author">
          <a href="#">
            <img class="avatar border-gray" src="{{asset('assets')}}/img/default-avatar.png" alt="...">
            <h5 class="title">{{ auth()->user()->name }}</h5>
          </a>
          <p class="description">
            {{ auth()->user()->username }}
          </p>
          <p class="description">
            Data Criação: {{ (auth()->user()->created_at)->format('d/m/Y H:i:s') }}
          </p>
          <p class="description">
            Ultima Alteração: {{ (auth()->user()->updated_at)->format('d/m/Y H:i:s') }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
