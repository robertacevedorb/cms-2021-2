<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">NOTAS</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div>
            <?php mostrar_msj(); ?>
        </div>
        <?php notas_add(); ?>
        <form action="" method="post">
            <label for="">Agregar</label>
            <div class="form-group">
                <label for="">DNI</label>
                <!-- <input type="text" class="form-control" name="nota_dni" required> -->
                <select name="alum_id" id="alum_id" class="form-control">
                    <?php
                        $query = query("SELECT alum_id, CONCAT(alum_nombres, ' ', alum_apellidos) AS alumnos  FROM alumno");
                        confirmar($query);
                        while($fila = fetch_array($query)){
                            ?>
                                <option value="<?php echo $fila['alum_id']; ?>"><?php echo $fila['alumnos']; ?></option>
                        <?php }
                    ?>
                </select>
                <label for="">Nombre Curso</label>
                <input type="text" class="form-control" name="nota_nom_curso" required>
                <label for="">Calificacíon</label>
                <input type="text" class="form-control" name="nota_calificacion" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar Notas" name="guardar" class="btn btn-primary">
            </div>
        </form>
        <?php
            if(isset($_GET['edit'])){
                include(TEMPLATE_BACK . DS . "notas_edit.php");
            }
            if(isset($_GET['delete'])){
                $id = escape_string(trim($_GET['delete']));
                notas_delete($id);
            }
            ?>
    </div>
    <div class="col-md-6">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Alumno</th>
                    <th>DNI</th>
                    <th>Nombre de Curso</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                <?php show_nota(); ?>
            </tbody>
        </table>
    </div>
</div>