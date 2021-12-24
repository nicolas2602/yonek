<div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
        <div class="modal-body">       
            <input type="hidden" type="text" name="id" id="id">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nome:</label>
              <input type="text" class="form-control" name="name" id="nome">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">E-mail:</label>
              <input type="text" class="form-control" name="emailUp" id="email">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Senha:</label>
              <input type="password" class="form-control" name="senhaUp" id="senha">
            </div>       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" name="up" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
    </div>
  </div>
</div>