<div class="modal fade" id="mdl-nuevo-usuario" tabindex="-1" aria-labelledby="mdl-nuevo-usuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl-nuevo-usuarioLabel">Nuevo Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frm-nuevo-usuario" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

          <div class="mb-3">
            <label for="name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="mb-3">
            <label for="password" class="col-form-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3">
            <label for="password-confirm" class="col-form-label">Confirmar Contraseña:</label>
            <input type="password" class="form-control" id="password-confirm" name="password-confirm">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit"class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>