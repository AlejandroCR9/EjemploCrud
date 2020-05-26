<?php 
    require_once('modelo/estudiante_model.php');

    class estudiante_controller{

        private $model_e;
        private $model_p;

        function __construct(){
            //Vamos a instanciar la variable model_e asignandole el objeto de nuestra clase estudiante_model.php
            $this->model_e=new estudiante_model();
        }

        function indexE(){
            //Cuando mandamos a llamar el Index Se requiere enviar una solicitud al modelo para que nos regrese un array
            //con todos los estudiantes ya registrados y nos permite llenar nuestro crud ubicado en IndexEstudiante.php
            $query =$this->model_e->get();

            include_once('vistas/header.php');
            include_once('vistas/indexEstudiante.php');
            include_once('vistas/footer.php');
        }
        function estudiante(){
            //Se manda a llamar a el formulario para ingresar los datos de un nuevo estudiante
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/estudiante.php');
            include_once('vistas/footer.php');
        }
        function get_datosE(){
            //Aqui vamos a tomar los datos de nuestro formulario 
            
            //$data['id']=$_REQUEST['txt_id'];
            $data['cedula']=$_REQUEST['txt_cedula'];
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['apellidos']=$_REQUEST['txt_apellidos'];
            $data['promedio']=$_REQUEST['txt_promedio'];
            $data['edad']=$_REQUEST['txt_edad'];
            $data['fecha']=$_REQUEST['txt_fecha'];
            $data['universidad']=$_REQUEST['txt_universidad'];
            $data['carrera']=$_REQUEST['txt_carrera'];
            
            //Si el id es igual a 0 signitica que se esta realizando un INSERT y se manda a llamar el metodo create de nuestro modelo
            if ($_REQUEST['id']=="") {
                $this->model_e->create($data);
            }
            //Cuando id tiene un valor significa que sera un UPDATE entonces se manda a llamar dicha funcion de nuestro modelo
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }
            
            header("Location:index.php?m=indexE");

        }

        function confirmarDeleteE(){
            //Se confirmara la elimincacion de un registro seleccionando la id y mandando a llaamar la funcion delete
            //de nuestro modelo de estudiantes.

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id']);
                header("Location:index.php?m=indexE");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
        }
        function login(){
            include_once('vistas/login.php');
            include_once('vistas/footer.php');

        }

        function salir(){
            //Tenemos que finalizar la sesion cuando señalamos exit y nos regresa al final
            session_start();
            session_destroy();
            header("Location:index.php");
        }
        //La funcion ingreso, valida los datos de usuario y contraseña para posteriormente verificar
        //si aprueba el acceso o lo denega.
        function ingreso(){
            $data['user']=$_REQUEST['txt_usuario'];
            $data['contra']=$_REQUEST['txt_contra'];
            if($data['user']=="admin" && $data['contra']=="admin"){
                session_start();
                $_SESSION["user"]="admin";
                header("Location:index.php?m=indexE");
            }else{
                echo("<script>alert('Error en usuario y/o contraseña');</script>");
                header("Location:index.php");

            }
        }

    }
?>