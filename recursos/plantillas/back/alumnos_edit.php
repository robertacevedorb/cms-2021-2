<?php
    if(isset($_GET['edit'])){
        $id = escape_string(trim($_GET['edit']));
        // echo $id;
        $query = query("SELECT * FROM alumno WHERE alum_id = {$id}");
        confirmar($query);
        $fila = fetch_array($query);
        // print_r($fila);
    }
?>
<hr>
<form action="" method="post" class="mt-2">
    <div class="form-group">
        <label for=""><strong>Editar Alumno</strong></label>
        <br>
        <label for="">Nombres</label>
        <input type="text" class="form-control" name="alum_nombres_edit" required value="<?php echo $fila['alum_nombres']; ?>">
        <label for="">Apellidos</label>
        <input type="text" class="form-control" name="alum_apellidos_edit" required value="<?php echo $fila['alum_apellidos']; ?>">
        <label for="">DNI</label>
        <input type="text" class="form-control" name="alum_dni_edit" required value="<?php echo $fila['alum_dni']; ?>">
        <label for="">Email</label>
        <input type="text" class="form-control" name="alum_email_edit" required value="<?php echo $fila['alum_email']; ?>">
        <label for="">Fecha de Nac.</label>
        <input type="text" class="form-control" name="alum_fnac_edit" required value="<?php echo $fila['alum_fnac']; ?>">
    </div>
    <div class="form-group">
        <input type="submit" value="Editar" name="editar" class="btn btn-warning">
    </div>
</form>
<?php alumno_edit($id); ?>