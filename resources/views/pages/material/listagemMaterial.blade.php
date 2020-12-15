@extends('layouts.app', [
'namePage' => 'Listagem de Materiais',
'class' => 'sidebar-mini',
'activePage' => 'listagemMateriais',
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
          <a href="{{route('material.create')}}" class="btn w-75 text-center" style="background: #016164; margin: 0 auto">Novo Material <i class="now-ui-icons ui-1_simple-add"></i></a>
        </div>
        <div class="card-body">
          <div class="table-responsive-md" style="overflow: initial!important;">
            <table class="table">
              <thead class="">
                <th class="text-left">Descrição</th>
                <th class="text-left">Opções</th>
              </thead>
              <tbody>
                @foreach ($consulta as $item)
                <tr>
                  <td class="text-left">{{$item->descricao}}</td>
                  <td class="text-left">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #016164">
                        Action
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('material.edit', $item->id) }}"><i class="fa fa-edit"></i> Alterar</a>
                        <a class="dropdown-item" href="{{$item->id}}" data-contid={{$item->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-times-circle"></i> Remover</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-10"><p>Mostrando {{$consulta->count()}} materiais de um total de {{$consulta->total()}}</p></div>
            <div class="col-md-2">{{$consulta->links()}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- modal Deletar--}}
  @include('pages.material.modalExcluirMaterial')
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src='{{asset('js/material/material.js')}}'></script>
@endpush
@endsection
