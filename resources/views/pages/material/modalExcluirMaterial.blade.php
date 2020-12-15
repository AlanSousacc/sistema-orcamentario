<div id="delete" class="modal fade text-danger" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger" style="text-align: center; display: inline;">
        <button type="button" aria-hidden="true" data-dismiss="alert" class="close">
          <i class="now-ui-icons ui-1_simple-remove" style="color: #fff"></i>
        </button>
        <h4 class="modal-title text-center" style="color:#fff">Confirmação de exclusão</h4>
      </div>
      <form action="{{route('material.destroy', 'id')}}" method="post">
        {{method_field('delete')}}
        {{ csrf_field() }}
        <div class="modal-body">
          <p class="text-center">Você tem certeza que deseja excluir este Produto?</p>
          <input type="hidden" name="material_id" id="contid" value="">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger w-50" >Sim, Excluir</button>
          <button type="button" class="btn btn-default w-50" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
