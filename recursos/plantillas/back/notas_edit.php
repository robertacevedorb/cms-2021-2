<?php
    if(isset($_GET['edit'])){
        $id = escape_string(trim($_GET['edit']));
        $query = query("SELECT * FROM notas WHERE nota_id = {$id}");
        confirmar($query);
        $fila = fetch_array($query);

    }
?>
<hr>
<form action="" method="post" class="mt-2">
    <div class="form-group">
        <label for="">Editar Cursos</label>

        <input type="text" class="form-control" name="nota_dni" required value="<?php echo $fila['nota_dni']; ?>">
        <input type="text" class="form-control" name="nota_nom_curso" required value="<?php echo $fila['nota_nom_curso']; ?>">
        <input type="text" class="form-control" name="nota_calificacion" required value="<?php echo $fila['nota_calificacion']; ?>">
        
    </div>
    <div class="form-group">
        <input type="submit" value="Editar" name="editar" class="btn btn-warning">
    </div>
</form>
<?php notas_edit($id); ?>