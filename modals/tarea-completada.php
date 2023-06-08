<!-- Modal para marcar tarea como completada -->
<div class="modal fade" id="completadoModal<?php echo $row['id_tarea']; ?>" tabindex="-1" role="dialog" aria-labelledby="completadoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h2 class="modal-title" id="completadoModalLabel">Marcar como completado</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>¿Estás seguro de que deseas marcar esta tarea como completada?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="check.php?id=<?php echo $row['id_tarea']; ?>" method="POST">
                    <button type="submit" class="btn btn-success" name="done">Marcar como completado</button>
                </form>
            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-success mr-1 marcar-completado" data-toggle="modal" data-target="#completadoModal<?php echo $row['id_tarea']; ?>">
    <i class="fas fa-check"></i>
</button>