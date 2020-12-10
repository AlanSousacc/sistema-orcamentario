
@extends('layouts.app', [
'namePage' => 'Listagem de Usuários',
'class' => 'sidebar-mini',
'activePage' => 'listagemusuario',
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
          <h4 class="card-title"> Usuários</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive-md" style="overflow-y: hidden">
            <table class="table">
              <thead class="">
                <th scope="col">Nome</th>
                <th scope="col">Username</th>
                <th scope="col">Opções</th>
              </thead>
              <tbody>
                @foreach ($consulta as $item)
                <tr>
                  <td class="text-left">{{$item->name}}</td>
                  <td class="text-left">{{$item->username}}</td>
                  <td class="text-left">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #016164">
                        Action
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('user.edit', $item->id) }}">Alterar</a>
                        <a class="dropdown-item" href="{{$item->id}}" data-contid={{$item->id}} data-target="#delete" data-toggle="modal">Remover</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-10"><p>Mostrando {{$consulta->count()}} usários de um total de {{$consulta->total()}}</p></div>
            <div class="col-md-2">{{$consulta->links()}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- modal Deletar--}}
  @include('users.modalExcluirUsuarios')
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src='{{asset('js/usuarios/usuarios.js')}}'></script>
@endpush
@endsection
