<?php require_once("./recursos/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "head.php"); ?> 

    <?php include(TEMPLATE_FRONT . DS . "topnav.php"); ?> 
        <div id="layoutSidenav">
            <?php
                include(TEMPLATE_FRONT . DS . "sidenav.php");
            ?>

            <div id="layoutSidenav_content">
                <main>
                    <?php
                        if(isset($_GET['alumnos'])){
                            include(TEMPLATE_BACK . DS . "alumnos.php");
                        }

                        if(isset($_GET['vernota'])){
                            include(TEMPLATE_BACK . DS . "nota_alumno.php");
                        }
                        
                        if(isset($_GET['notas'])){
                            include(TEMPLATE_BACK . DS . "notas.php");
                        }
                    ?>
                </main>
                <?php
                    include(TEMPLATE_FRONT . DS . "footer.php");
                ?>

</html>
