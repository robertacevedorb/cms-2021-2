<?php
    ob_start();
    session_start();
    //session_destroy();

    // echo DIRECTORY_SEPARATOR;
    // echo __dir__; -> C:\xampp\htdocs\dw2021-2\04 CMS\recursos
    # -> \
    # -> /
    # c:/xampp/app/public
    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
    
    
    // RUTAS RELATIVAS
    defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "plantillas/front");
    defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "plantillas/back");
    // echo TEMPLATE_FRONT;

    // DEFINIR PARAMETROS DE CONEXION COMO CONSTANTES
    defined("DB_HOST") ? null : define("DB_HOST", "localhost");
    defined("DB_USER") ? null : define("DB_USER", "root");
    defined("DB_PASS") ? null : define("DB_PASS", "");
    defined("DB_NAME") ? null : define("DB_NAME", "academiaAcevedo");

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // if($conexion){
    //     echo "estamos conectados, felicitaciones!!!⭐⭐⭐";
    // }
    require_once("funciones.php");

?>