<div class="modal fade" id="modal_carEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Atualizar Carro</h5>
        <button type="button" class="btn-close btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
        <input type="hidden" name="id" id="id">
        <div class="modal-body text-white">       
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nome do Carro:</label>
              <input type="text" class="form-control" name="carro" id="carro" required>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <label for="recipient-name" class="col-form-label">Marca:</label>
                <input type="text" class="form-control" name="marca" id="marca" required>
              </div>
              <div class="col-sm-4">
                <label for="recipient-name" class="col-form-label">Ano:</label>
                <input type="number" class="form-control" placeholder="YYYY" min="1900" max="2100" name="ano" id="ano" required>
              </div>
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