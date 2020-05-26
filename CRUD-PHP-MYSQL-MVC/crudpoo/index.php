<?php
    require_once('bd/conexion.php');
    require_once('controlador/estudiante_controller.php');
    require_once('controlador/universidad_controller.php');
    require_once('controlador/carrera_controller.php');
    //Primeramente creamos 3 objetos para instancias los 3 tipos de controladores que usaremos en nuestro programa
    $controllerEstudiante = new estudiante_controller();
    $controllerUniversidad = new universidad_controller();
    $controllerCarrera = new carrera_controller();
    //Vamos a verificar que controlador vamos a utilizar en base a el ($_REquest) para posteriormente ejecutar 
    //la funcion que se requiera.
    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controllerEstudiante, $metodo)) {
            $controllerEstudiante->$metodo();
        }else if(method_exists($controllerUniversidad, $metodo)){
            $controllerUniversidad->$metodo();
        }else if(method_exists($controllerCarrera, $metodo)){
            $controllerCarrera->$metodo();
        }
    }else{
        //Si esto no se cumple entonces se manda a la vista del login directamente
        $controllerEstudiante->login();
    }




?>