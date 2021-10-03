<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">ALUMNOS</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div>
            <?php mostrar_msj(); ?>
        </div>
        <?php alumnos_add(); ?>
        <form action="" method="post">
            <label for=""><strong>Agregar</strong></label>
            <br>
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control" name="alum_nombres" required>
                <label for="">Apellidos</label>
                <input type="text" class="form-control" name="alum_apellidos" required>
                <label for="">DNI</label>
                <input type="text" class="form-control" name="alum_dni" required>
                <label for="">Email</label>
                <input type="text" class="form-control" name="alum_email" required>
                <label for="">Fecha Nacimiento</label>
                <input type="text" class="form-control" name="alum_fnac" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar alumno" name="guardar" class="btn btn-primary">
            </div>
        </form>
        <?php
            if(isset($_GET['edit'])){
                //echo $_GET['edit'];
                include(TEMPLATE_BACK . DS . "alumnos_edit.php");
            }
            if(isset($_GET['delete'])){
                // echo $_GET['delete'];
                $id = escape_string(trim($_GET['delete']));
                alumno_delete($id);
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
                    <th>Email</th>
                    <th>fechaNac</th>
                </tr>
            </thead>
            <tbody>
                <?php show_alumnos(); ?>
            </tbody>
        </table>
    </div>
</div>