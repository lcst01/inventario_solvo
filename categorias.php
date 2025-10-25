<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Encabezado de página -->
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800">
      <i class="fas fa-tags me-2 text-primary"></i> Categorías
    </h1>

    <!-- Botón: Agregar categoría (abre modal) -->
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCategoria">
      <i class="fas fa-plus me-1"></i> Nueva categoría
    </button>
  </div>

  <!-- Descripción -->
  <p class="mb-4">
    Gestiona las categorías de productos desde esta sección. Utiliza el botón <strong>“Nueva categoría”</strong> para añadir una nueva.
  </p>

  <!-- Tabla -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">
        <i class="fas fa-list me-2"></i> Listado de categorías
      </h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered align-middle tablas" id="tablaCategorias" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th style="width: 60px;">#</th>
              <th><i class="fas fa-tag me-1 text-secondary"></i> Nombre de la categoría</th>
              <th style="width: 140px;"><i class="fas fa-cogs me-1 text-secondary"></i> Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              // // Obtener categorías desde el controlador
              // $categorias = ControladorCategorias::mostrarCategorias();

              // if (!empty($categorias)) {
              //   $i = 1;
              //   foreach ($categorias as $cat) {
              //     // Saneo básico
              //     $id   = isset($cat['id_categoria']) ? (int)$cat['id_categoria'] : 0;
              //     $name = htmlspecialchars($cat['nombre_categoria'] ?? '', ENT_QUOTES, 'UTF-8');

              //     echo '<tr data-id="'.$id.'">
              //             <td class="text-center">'.$i.'</td>
              //             <td>'.$name.'</td>
              //             <td class="text-nowrap text-center">
              //               <button class="btn btn-outline-primary btn-sm me-1" data-bs-toggle="tooltip" title="Editar categoría" data-action="edit" data-id="'.$id.'">
              //                 <i class="fas fa-edit"></i>
              //               </button>
              //               <button class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" title="Eliminar categoría" data-action="delete" data-id="'.$id.'">
              //                 <i class="fas fa-trash"></i>
              //               </button>
              //             </td>
              //           </tr>';
              //     $i++;
              //   }
              // } else {
              //   echo '<tr>
              //           <td colspan="3" class="text-center text-muted">
              //             No hay categorías registradas.
              //           </td>
              //         </tr>';
              // }
            ?>
          </tbody>
          <tfoot class="thead-light">
            <tr>
              <th>#</th>
              <th>Nombre de la categoría</th>
              <th>Acciones</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- Modal: Agregar/Editar categoría -->
<div class="modal fade" id="modalCategoria" tabindex="-1" aria-labelledby="modalCategoriaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formCategoria" class="modal-content" method="post" autocomplete="off">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCategoriaLabel">
          <i class="fas fa-plus me-1 text-primary"></i> Nueva categoría
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label for="inputCategoria" class="form-label">
            <i class="fas fa-tag me-1 text-secondary"></i> Nombre de la categoría
          </label>
          <input type="text" class="form-control" id="inputCategoria" name="categoria" placeholder="Ejemplo: Selladores" required>
          <div class="invalid-feedback">Por favor, escribe un nombre válido.</div>
        </div>

        <?php
          // Procesa POST (crear)
          $crearCategoria = new ControladorCategorias();
          $crearCategoria->crearCategoria();
        ?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
          <i class="fas fa-times me-1"></i> Cancelar
        </button>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save me-1"></i> Guardar
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Opcional: inicializar tooltips (y DataTable si no lo haces globalmente) -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
      new bootstrap.Tooltip(tooltipTriggerEl);
    });

  });
</script>
