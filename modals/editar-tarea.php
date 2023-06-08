<!-- MODAL PARA EDITAR TAREA -->
<div class="modal fade" id="editModal<?php echo $row['id_tarea']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['id_tarea']; ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h2 class="modal-title" id="editModalLabel<?php echo $row['id_tarea']; ?>">Editar tarea</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edit.php?id=<?php echo $row['id_tarea']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" placeholder="Tarea" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Descripción"><?php echo $row['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit-etiqueta">Etiqueta</label>
                        <select class="form-control" id="edit-etiqueta" name="etiqueta">
                            <option value="Trabajo">Trabajo</option>
                            <option value="Estudios">Estudios</option>
                            <option value="Casa">Casa</option>
                            <option value="Familia">Familia</option>
                            <option value="Ocio">Ocio</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-block" name="update">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>