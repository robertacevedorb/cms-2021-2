<?php
    function query($sql){
        global $conexion;
        return mysqli_query($conexion, $sql);
    }

    function confirmar($query){
        global $conexion;
        if(!$query){
            die("Fallo en la conexión " . mysqli_error($conexion));
        }
    }

    function fetch_array($query){
        global $conexion;
        return mysqli_fetch_array($query);
    }

    function escape_string($str){
        global $conexion;
        return mysqli_real_escape_string($conexion, $str);
    }

    function redirect($location){
        header("Location: $location");
    }

    function set_mensaje($msj){
        if(!empty($msj)){
            $_SESSION['mensaje'] = $msj;
        }
        else {
            $msj = '';
        }
    }

    function mostrar_msj(){
        if(isset($_SESSION['mensaje'])){
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
    }

    function display_success_msj($msj){
        $msj = <<<DELIMITADOR
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> $msj.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
DELIMITADOR;
        return $msj;
    }

    function display_danger_msj($msj){
        $msj = <<<DELIMITADOR
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> $msj.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
DELIMITADOR;
        return $msj;
    }
    /************************************/
    function contar_filas($query){
        return mysqli_num_rows($query);
    }

    function alumno_exist($dni){
        $query = query("SELECT * FROM alumno WHERE user_email = '{$dni}'");
        confirmar($query);
        if(contar_filas($query) >= 1){
            return true;
        }
        return false;
    }
    /* FUNCIONES BACK */
    function alumnos_add(){
        if(isset($_POST['guardar'])){
            // echo "se guardo la data!!!";
            // $cat_nombre = $_POST['cat_nombre'];
            // echo $cat_nombre;
            $alum_nombres = escape_string(trim($_POST['alum_nombres']));
            $alum_apellidos = escape_string(trim($_POST['alum_apellidos']));
            $alum_dni = escape_string(trim($_POST['alum_dni']));
            $alum_email = escape_string(trim($_POST['alum_email']));
            $alum_fnac = escape_string(trim($_POST['alum_fnac']));
            // echo $cat_nombre;
            $query = query("INSERT INTO alumno (alum_nombres, alum_apellidos, alum_dni, alum_email, alum_fnac) VALUES ('{$alum_nombres}', '{$alum_apellidos}', '{$alum_dni}', '{$alum_email}', '{$alum_fnac}')");
            confirmar($query);
            // header("Location: index.php?categorias");
            set_mensaje(display_success_msj("Alumno agregado correctamente 😁😁!"));
            redirect("index.php?alumnos");
            // echo display_success_msj("Categoria agregada correctamente");
        }
    }
    function show_alumnos(){
        $query = query("SELECT alum_id, CONCAT(alum_nombres,' ', alum_apellidos) AS alumno, alum_dni, alum_email, alum_fnac FROM alumno");
        confirmar($query);
        while($fila = fetch_array($query)){
            $alumnos = <<<DELIMITADOR
                <tr>
                    <td>{$fila['alum_id']}</td>
                    <td>{$fila['alumno']}</td>
                    <td>{$fila['alum_dni']}</td>
                    <td>{$fila['alum_email']}</td>
                    <td>{$fila['alum_fnac']}</td>
                    <td>
                        <a href="index.php?alumnos&edit={$fila['alum_id']}" class="btn btn-small btn-success">editar</a>
                    </td>
                    <td>
                        <a href="index.php?alumnos&delete={$fila['alum_id']}" class="btn btn-small btn-danger">borrar</a>
                    </td>
                    <td>
                        <a href="index.php?nota_alumno&vernota={$fila['alum_id']}" class="btn btn-small btn-primary">Ver</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $alumnos;
        }
    }

    function show_nota_alumno($dni){
        $query = query("SELECT nota_id, nota_nom_curso, nota_calificacion FROM notas WHERE nota_dni='{$dni}'");
        confirmar($query);
        while($fila = fetch_array($query)){
            $notas = <<<DELIMITADOR
                <tr>
                    <td>{$fila['nota_id']}</td>
                    <td>{$fila['nota_nom_curso']}</td>
                    <td>{$fila['nota_calificacion']}</td>
                </tr>
DELIMITADOR;
            echo $notas;
        }
    }

    function alumno_edit($id){
        if(isset($_POST['editar'])){
            // echo 'funcionaaaaa';
            $alum_nombres = escape_string(trim($_POST['alum_nombres_edit']));
            $alum_apellidos = escape_string(trim($_POST['alum_apellidos_edit']));
            $alum_dni = escape_string(trim($_POST['alum_dni_edit']));
            $alum_email = escape_string(trim($_POST['alum_email_edit']));
            $alum_fnac = escape_string(trim($_POST['alum_fnac_edit']));
            $query = query("UPDATE alumno SET alum_nombres = '{$alum_nombres}', alum_apellidos = '{$alum_apellidos}', alum_dni = '{$alum_dni}', alum_email = '{$alum_email}', alum_fnac = '{$alum_fnac}' WHERE alum_id = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj("El alumno fue editado correctamente 😁😁"));
            redirect("index.php?alumnos");
        }
    }
    
    function alumno_delete($id){
        $query = query("DELETE FROM alumno WHERE alum_id = {$id}");
        confirmar($query);
        set_mensaje(display_success_msj("Alumno eliminado correctamente 💥💥"));
        redirect("index.php?alumnos");
    }

    

    function notas_add(){
        if(isset($_POST['guardar'])){
            $id = escape_string(trim($_POST['alum_id']));
            $query_alumno = query("SELECT * FROM alumno WHERE alum_id = {$id}");
            confirmar($query_alumno);
            $fila = fetch_array($query_alumno);
            

            $dni =  $fila['alum_dni'];
            $nota_nom_curso = escape_string(trim($_POST['nota_nom_curso']));
            $nota_calificacion = escape_string(trim($_POST['nota_calificacion']));
            // echo $cat_nombre;
            $query = query("INSERT INTO notas (nota_dni, nota_nom_curso, nota_calificacion) VALUES ('{$dni}', '{$nota_nom_curso}', {$nota_calificacion})");
            confirmar($query);
            // header("Location: index.php?categorias");
            set_mensaje(display_success_msj("Nota agregada correctamente 😁😁!"));
            redirect("index.php?notas");
        }
    }
    function notas_edit($id){
        if(isset($_POST['editar'])){
            $nota_dni = escape_string(trim($_POST['nota_dni']));
            $nota_nom_curso = escape_string(trim($_POST['nota_nom_curso']));
            $nota_calificacion = escape_string(trim($_POST['nota_calificacion']));
            $query = query("UPDATE notas SET nota_dni = '{$nota_dni}', nota_nom_curso = '{$nota_nom_curso}', nota_calificacion = '{$nota_calificacion}' WHERE nota_id = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj("La nota fue editada correctamente 😁😁"));
            redirect("index.php?notas");
        }
    }

    function notas_delete($id){
        $query = query("DELETE FROM notas WHERE nota_id = {$id}");
        confirmar($query);
        set_mensaje(display_success_msj("Nota eliminada correctamente 💥💥"));
        redirect("index.php?notas");
    }

    function show_nota(){
        $query = query("SELECT n.nota_id, CONCAT(a.alum_nombres,' ', a.alum_apellidos) AS alumnos,  n.nota_dni, n.nota_nom_curso, n.nota_calificacion FROM notas n INNER JOIN alumno a ON n.nota_dni=a.alum_dni");
        confirmar($query);
        while($fila = fetch_array($query)){
            $notas = <<<DELIMITADOR
                <tr>
                    <td>{$fila['nota_id']}</td>
                    <td>{$fila['alumnos']}</td>
                    <td>{$fila['nota_dni']}</td>
                    <td>{$fila['nota_nom_curso']}</td>
                    <td>{$fila['nota_calificacion']}</td>
                    <td>
                        <a href="index.php?notas&edit={$fila['nota_id']}" class="btn btn-small btn-success">editar</a>
                    </td>
                    <td>
                        <a href="index.php?notas&delete={$fila['nota_id']}" class="btn btn-small btn-danger">borrar</a>
                </td>
                </tr>
DELIMITADOR;
            echo $notas;
        }
    }
?>