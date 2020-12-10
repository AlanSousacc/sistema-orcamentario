@extends('layouts.app', [
'namePage' => 'Listagem de Pedidos',
'class' => 'sidebar-mini',
'activePage' => 'listagemPedidos',
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
          <h4 class="card-title"> Orçamentos</h4>
        </div>
        @include('pages.orcamento.listagemOrcamentoBase')
      </div>
    </div>
  </div>
  {{-- modal Deletar--}}
  @include('pages.orcamento.modalExcluirOrcamento')
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src='{{asset('js/orcamento/orcamento.js')}}'></script>
@endpush
@endsection
