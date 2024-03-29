<div class="input-group {{ $errors->has('name') ? ' has-danger' : '' }}">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <i class="now-ui-icons users_circle-08"></i>
    </div>
  </div>
  <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome Completo') }}" type="text" name="name" value="{{isset($user) ? $user->name : old('name')}}" required autofocus>
  @if ($errors->has('name'))
    <span class="invalid-feedback" style="display: block;" role="alert">
      <strong>{{ $errors->first('name') }}</strong>
    </span>
  @endif
</div>
<!--Begin input email -->
<div class="input-group {{ $errors->has('username') ? ' has-danger' : '' }}">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <i class="now-ui-icons ui-1_email-85"></i>
    </div>
  </div>
  <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="{{ __('Username') }}" type="text" name="username" value="{{isset($user) ? $user->username : old('username')}}" required>
 </div>
 @if ($errors->has('username'))
    <span class="invalid-feedback" style="display: block;" role="alert">
        <strong>{{ $errors->first('username') }}</strong>
    </span>
@endif
<!--Begin input user type-->

<!--Begin input password -->
<div class="input-group {{ $errors->has('password') ? ' has-danger' : '' }}">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <i class="now-ui-icons objects_key-25"></i>
    </div>
  </div>
  <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Senha') }}" type="password" name="password" required>
  @if ($errors->has('password'))
    <span class="invalid-feedback" style="display: block;" role="alert">
      <strong>{{ $errors->first('password') }}</strong>
    </span>
  @endif
</div>
<!--Begin input confirm password -->
<div class="input-group">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <i class="now-ui-icons objects_key-25"></i></i>
    </div>
  </div>
  <input class="form-control" placeholder="{{ __('Confirmação de Senha') }}" type="password" name="password_confirmation" required>
</div>
