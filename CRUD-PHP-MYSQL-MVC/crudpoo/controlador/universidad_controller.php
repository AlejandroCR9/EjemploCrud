<?php 
    require_once('modelo/universidad_model.php');

    class universidad_controller{

        private $model_u;
        private $model_p;

        function __construct(){
            //Vamos a instanciar la variable model_e asignandole el objeto de nuestra clase universidad_model.php
            $this->model_u=new universidad_model();
        }

        function indexU(){
            //Cuando mandamos a llamar el Index Se requiere enviar una solicitud al modelo para que nos regrese un array
            //con todos los estudiantes ya registrados y nos permite llenar nuestro crud ubicado en IndexEstudiante.php
            $query =$this->model_u->get();

            include_once('vistas/header.php');
            include_once('vistas/universidad/indexUni.php');
            include_once('vistas/footer.php');
        }
        function universidad(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_u->get_id($_REQUEST['id']);    
            }
            $query=$this->model_u->get();
            include_once('vistas/header.php');
            include_once('vistas/universidad/universidad.php');
            include_once('vistas/footer.php');
        }

        function get_datosC(){

             //Aqui vamos a tomar los datos de nuestro formulario 
            $data['idUni']=$_REQUEST['txt_id'];
            $data['nombreUni']=$_REQUEST['txt_nombreU'];
            $data['ubicacion']=$_REQUEST['txt_ubicacion'];

             //Si el id es igual a 0 signitica que se esta realizando un INSERT y se manda a llamar el metodo create de nuestro modelo
            if ($_REQUEST['id']=="") {
                $this->model_u->create($data);
            }
            
            if($_REQUEST['id']!=""){
                //Cuando id tiene un valor significa que sera un UPDATE entonces se manda a llamar dicha funcion de nuestro modelo
                $date=$_REQUEST['id'];
                $this->model_u->update($data,$date);
            }
            
            header("Location:index.php?m=indexU");

        }

        function confirmarDeleteU(){

            $data=NULL;
            
            if ($_REQUEST['id']!=0) {
               $data=$this->model_u->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_idUni'];
                $this->model_u->delete($date['id']);
                header("Location:index.php?m=indexU");
            }

            include_once('vistas/header.php');
            include_once('vistas/universidad/confirmUni.php');
            include_once('vistas/footer.php');
            


        }


    }
?>