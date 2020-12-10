@extends('layouts.app', [
'namePage' => 'Detalhes do orcamento',
'class' => 'sidebar-mini',
'activePage' => 'detalheorcamento',
])
@section('content')
<div class="col-md-3 offset-md-9 fixed-top mt-3" style="z-index: 9999;">
  @include('layouts.messages.master-message')
</div>

<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row" >
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">{{__("Detalhes do Orçamento")}}</h5>
          <span class="text-center text-info" style="font-size: 18px">Cliente: {{$orcamento->contato->nome}}</span>
        </div>
        <div class="card-body">
          <div class="card card-nav-tabs card-plain">
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive" style="overflow: initial!important;">
                    <table class="table">
                      <thead class=" text-primary">
                        <th class="text-left">Descrição</th>
                        <th class="text-left">Qtde</th>
                      </thead>
                      <tbody>
                        @foreach ($orcamento->materiais as $item)
                        <tr>
                          <td class="text-left">{{$item->descricao}}
                            @if ($item->pivot->obsitem != null)
                            <br><small class="obs-item">{{$item->pivot->obsitem}}</small></td>
                            @endif
                          </td>
                          @if ($item->unidade == "Metro")
                            <td class="text-left">{{$item->pivot->qtde}} MT</td>
                          @elseif($item->unidade == "Centimetro")
                            <td class="text-left">{{$item->pivot->qtde}} CM</td>
                          @elseif($item->unidade == "Unidade")
                            <td class="text-left">{{$item->pivot->qtde}} UNID</td>
                          @else
                            <td class="text-left">{{$item->pivot->qtde}} PCT</td>
                          @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="card-footer text-center">
          <a href="{{route('imprimir.orcamento', $orcamento->id)}}" target="_blank" class="btn btn-success btn-round w-100"><i class="fa fa-file-pdf"></i> Exportar PDF</a>
        </div>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src='{{asset('js/orcamento/orcamento.js')}}'></script>
@endpush
@endsection
