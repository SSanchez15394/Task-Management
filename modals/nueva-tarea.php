<!-- Modal para añadir nueva tarea -->
<button id="añadirTarea" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addTaskModal"><i class="fa-solid fa-circle-plus"></i> Añadir nueva tarea</button>
                <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h2 class="modal-title text-dark" id="addTaskModalLabel">Añadir nueva tarea</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario para procesar los datos -->
                                <form method="POST" action="tareas.php">
                                    <div class="form-group text-dark">
                                        <h5><label for="tarea">Tarea:</label></h5>
                                        <input type="text" class="form-control" id="tarea" name="tarea" placeholder="Tarea">
                                    </div>
                                    <div class="form-group text-dark">
                                        <h5><label for="descripcion">Descripción:</label></h5>
                                        <h5><textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" maxlength="150"></textarea>
                                    </div>
                                    <div class="form-group text-dark">
                                        <h5><label for="etiqueta">Etiqueta:</label></h5>
                                        <select class="form-control" id="etiqueta" name="etiqueta">
                                            <option value="Trabajo">Trabajo</option>
                                            <option value="Estudios">Estudios</option>
                                            <option value="Casa">Hogar</option>
                                            <option value="Familia">Familia</option>
                                            <option value="Ocio">Ocio</option>
                                            <option value="Otros">Otros</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>