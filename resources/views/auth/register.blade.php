@extends('layouts.app', [
'namePage' => 'Novo Usuário',
'class' => 'sidebar-mini',
'activePage' => 'novousuario',
])

@section('content')
<div class="col-sm-12 fixed-bottom mt-3" style="z-index: 9999;">
  @include('layouts.messages.master-message')
</div>

<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Novo Usuário</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <!--Begin input name -->
            @include('users.formUsers')
            <div class="card-footer ">
              <button type="submit" class="btn btn-primary btn-round btn-md w-100" style="background: #016164">{{__('Cadastrar')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  {{-- modal Deletar--}}
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src='{{asset('js/produtos/produtos.js')}}'></script>
<script>
  $(document).ready(function() {
    demo.checkFullPageBackgroundImage();
  });
</script>
@endpush
@endsection
