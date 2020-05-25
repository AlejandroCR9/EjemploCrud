<?php
    
    class carrera_model{
        private $DB;
        private $carrera;

        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT * FROM carrera ORDER BY idCarrera DESC';
            $fila=$this->DB->query($sql);
            $this->carrera=$fila;
            return  $this->carrera;
        }

        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO carrera(nombreCarrera,capacidad,uniFK)VALUES (?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombreCarrera'],$data['capacidad'],$data['uniFK']));
            Database::disconnect();       

        }
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM carrera where idCarrera = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE carrera  set  nombreCarrera =?, capacidad=?, uniFK=? WHERE idCarrera = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombreCarrera'],$data['capacidad'],$data['uniFK'], $date));
            Database::disconnect();

        }

        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM carrera where idCarrera=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

