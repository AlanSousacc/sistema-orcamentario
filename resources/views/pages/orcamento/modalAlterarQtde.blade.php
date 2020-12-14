<div id="altQtde" class="modal fade text-default" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success" style="text-align: center; display: inline;">
        <button type="button" aria-hidden="true" data-dismiss="alert" class="close">
          <i class="now-ui-icons ui-1_simple-remove" style="color: #fff"></i>
        </button>
        <h4 class="modal-title text-center" style="color:#fff">Alterar Quantidade</h4>
      </div>
      <form>
        <div class="modal-body">
          <p class="text-center">Informe a quantidade que deseja somar</p>
          <input type="hidden" name="id" id="id" value="">
          <label class=" control-label">Quantidade Atual:</label>
          <input type="text" disabled name="qtde_anterior" id="qtde_anterior" value="" class="w-100 text-center">
          <label class="control-label mt-2">Nova Quantidade:</label>
          <input type="number" min="1" max="10000" name="qtde_add" id="qtde_add" value="0" class="w-100 text-center">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success confirmar w-50" data-dismiss="modal">Confirmar</button>
          <button type="button" class="btn btn-default cancel w-50" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
