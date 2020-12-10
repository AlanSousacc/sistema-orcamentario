@extends('layouts.app', [
'namePage' => 'editar produto',
'class' => 'sidebar-mini',
'activePage' => 'editarproduto',
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
          <h5 class="title">{{__(" Editar Produto")}}</h5>
        </div>
        <div class="card-body">
				<form action="{{route('material.update', $material->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
					<input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @csrf
					@include('alerts.success')
					@include('pages.material.formMaterial')
					<div class="card-footer ">
						<button type="submit" class="btn btn-primary btn-round" style="background: #016164">{{__('Salvar Alterações')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src='{{asset('js/produtos/produtos.js')}}'></script>
@endpush
@endsection
