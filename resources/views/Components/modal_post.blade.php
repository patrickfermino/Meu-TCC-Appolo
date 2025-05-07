
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title nav-link" id="postModalLabel">Novo Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="imagens" class="form-label">Imagens</label>
                <input class="form-control" type="file" name="imagens[]" id="imagens" multiple>
              </div>

              <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título do seu post">
              </div>

              <div class="mb-4">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreva sua obra"></textarea>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-outline-custom" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary-custom">Publicar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
