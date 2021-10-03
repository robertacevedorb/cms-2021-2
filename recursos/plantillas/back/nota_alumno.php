<?php
    if(isset($_GET['vernota'])){
        $id = escape_string(trim($_GET['vernota']));
        // echo $id;
        $query = query("SELECT CONCAT(alum_nombres, ' ', alum_apellidos) AS alumno, alum_dni, alum_email,alum_fnac FROM alumno WHERE alum_id = {$id}");
        confirmar($query);
        $fila = fetch_array($query);
        $dni= $fila['alum_dni'];
        // print_r($fila);
    }
?>
<hr>
<div class="col-md-6">
        <p><strong>Alumno: </strong><?php echo $fila['alumno']; ?></p>
        <p><strong>DNI: </strong><?php echo $dni; ?></p>
        <p><strong>Email: </strong><?php echo $fila['alum_email']; ?></p>
        <p><strong>Fecha de Nac: </strong><?php echo $fila['alum_fnac']; ?></p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Curso</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php show_nota_alumno($dni); ?>
            </tbody>
        </table>
    </div>