@extends('layouts.app', [
'namePage' => 'Listagem de Contatos',
'class' => 'sidebar-mini',
'activePage' => 'listagemContato',
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
        <div class="card-header row">
          <a href="{{route('contato.create')}}" class="btn w-75 text-center" style="background: #016164; margin: 0 auto">Novo Contato <i class="now-ui-icons ui-1_simple-add"></i></a>
        </div>
        <div class="card-body">
          <div class="table-responsive-md" style="overflow: initial!important;">
            <table class="table">
              <thead class="">
                <th class="text-left">Nome</th>
                <th class="text-left">Opções</th>
              </thead>
              <tbody>
                @foreach ($consulta as $item)
                <tr>
                  <td class="text-left">{{$item->nome}}</td>
                  <td class="text-left">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #016164">
                        Action
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('contato.edit', $item->id) }}"><i class="ionicons ion-ios-paper-outline"></i> Alterar</a>
                        <a class="dropdown-item" href="{{$item->id}}" data-contid={{$item->id}} data-target="#delete" data-toggle="modal"><i class="ionicons ion-ios-close-outline"></i> Remover</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-10"><p>Mostrando {{$consulta->count()}} contatos de um total de {{$consulta->total()}}</p></div>
            <div class="col-md-2">{{$consulta->links()}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- modal Deletar--}}
  @include('pages.contatos.modalExcluirContato')
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src='{{asset('js/contato/contato.js')}}'></script>
@endpush
@endsection
