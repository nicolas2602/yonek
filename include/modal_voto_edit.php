<div class="modal fade" id="modal_votoEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <label for="recipient-name" class="col-form-label">Nome do Candidato:</label>
              <input type="text" class="form-control" name="cand" id="cand" required>
            </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" name="upV" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
    </div>
  </div>
</div>