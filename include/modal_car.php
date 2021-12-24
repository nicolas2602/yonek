<div class="modal fade" id="modal_car" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-white" id="exampleModalLabel">Cadastro de Carro</h5>
        <button type="button" class="btn-close btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
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
          <button type="submit" name="cad" class="btn btn-success">Cadastrar</button>
        </div>
    </form>
    </div>
  </div>
</div>