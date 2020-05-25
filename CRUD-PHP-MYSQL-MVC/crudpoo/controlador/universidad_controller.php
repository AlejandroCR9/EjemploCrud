<?php 
    require_once('modelo/universidad_model.php');

    class universidad_controller{

        private $model_u;
        private $model_p;

        function __construct(){
            $this->model_u=new universidad_model();
        }

        function index(){
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

            
            $data['idUni']=$_REQUEST['txt_id'];
            $data['nombreUni']=$_REQUEST['txt_nombreU'];
            $data['ubicacion']=$_REQUEST['txt_ubicacion'];

            if ($_REQUEST['id']=="") {
                $this->model_u->create($data);
            }
            
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_u->update($data,$date);
            }
            
            header("Location:index.php");

        }

        function confirmarDelete(){

            $data=NULL;
            
            if ($_REQUEST['id']!=0) {
               $data=$this->model_u->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_idUni'];
                $this->model_u->delete($date['id']);
                header("Location:index.php");
            }

            include_once('vistas/header.php');
            include_once('vistas/universidad/confirmUni.php');
            include_once('vistas/footer.php');
            


        }


    }
?>