<div id="impressao" class="modal fade text-default" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success" style="text-align: center; display: inline;">
        <button type="button" aria-hidden="true" data-dismiss="alert" class="close">
          <i class="now-ui-icons ui-1_simple-remove" style="color: #fff"></i>
        </button>
        <h4 class="modal-title text-center" style="color:#fff">Exportar Orçamento</h4>
      </div>
      <form action="{{route('exportar.orcamento')}}" method="get">
        {{ csrf_field() }}
        <div class="modal-body">
          <p class="text-center">O orçamento foi gerado com sucesso, agora você pode Exporta-lo.</p>
          <p class="text-center">Você deseja realizar a exportação deste orçamento?</p>
          <input type="hidden" name="orcamento_id" id="orcamento_id" value="">
        </div>
        <div class="modal-footer">
          <a href="{{route('exportar.orcamento', session()->get('orcamento') )}}" target="_blank"  class="btn btn-success imprimir w-50" >Sim, Exportar</a>
          <button type="button" class="btn btn-default w-50" data-dismiss="modal">Não, Fechar!</button>
        </div>
      </form>
    </div>
  </div>
</div>
