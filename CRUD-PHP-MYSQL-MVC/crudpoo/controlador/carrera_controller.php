<?php 
    require_once('modelo/carrera_model.php');

    class carrera_controller{

        private $model_c;
        private $model_p;

        function __construct(){
            //Vamos a instanciar la variable model_c asignandole el objeto de nuestra clase carrera_model.php
            $this->model_c=new carrera_model();
        }

        function indexC(){
            $query =$this->model_c->get();
 //Cuando mandamos a llamar el Index Se requiere enviar una solicitud al modelo para que nos regrese un array
            //con todos los estudiantes ya registrados y nos permite llenar nuestro crud ubicado en IndexEstudiante.php
            include_once('vistas/header.php');
            include_once('vistas/carrera/indexCarrera.php');
            include_once('vistas/footer.php');
        }
        function carrera(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_c->get_id($_REQUEST['id']);    
            }
            $query=$this->model_c->get();
            include_once('vistas/header.php');
            include_once('vistas/carrera/carrera.php');
            include_once('vistas/footer.php');
        }

        function get_datosA(){
            
            $data['idCarrera']=$_REQUEST['txt_id'];
            $data['nombreCarrera']=$_REQUEST['txt_nombreC'];
            $data['capacidad']=$_REQUEST['txt_capacidad'];
            $data['uniFK']=$_REQUEST['txt_univ'];

            if ($_REQUEST['id']=="") {
                $this->model_c->create($data);
            }
            
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_c->update($data,$date);
            }
            
            header("Location:index.php?m=indexC");

        }

        function confirmarDeleteC(){
 //Se confirmara la elimincacion de un registro seleccionando la id y mandando a llaamar la funcion delete
            //de nuestro modelo de carrera.
            $data=NULL;
            
            if ($_REQUEST['id']!=0) {
               $data=$this->model_c->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_idCarrera'];
                $this->model_c->delete($date['id']);
                header("Location:index.php?m=indexC");
            }

            include_once('vistas/header.php');
            include_once('vistas/carrera/confirmCarrera.php');
            include_once('vistas/footer.php');
            


        }


    }
?>