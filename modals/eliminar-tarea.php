<!-- Modal para eliminar tarea -->
<div class="modal fade" id="deleteModal<?php echo $row['id_tarea']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $row['id_tarea']; ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h2 class="modal-title" id="deleteModalLabel<?php echo $row['id_tarea']; ?>">Eliminar tarea</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>¿Estás seguro de que deseas eliminar esta tarea?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="delete.php?id=<?php echo $row['id_tarea']; ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['id_tarea']; ?>">
    <i class="far fa-trash-alt"></i>
</button>