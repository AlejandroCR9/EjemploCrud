<?php
    
    class universidad_model{
        private $DB;
        private $universidad;

        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT * FROM universidad ORDER BY idUni DESC';
            $fila=$this->DB->query($sql);
            $this->universidad=$fila;
            return  $this->universidad;
        }

        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO universidad(nombreUni,ubicacion)VALUES (?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombreUni'],$data['ubicacion']));
            Database::disconnect();       

        }
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM universidad where idUni = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE universidad  set  nombreUni =?, ubicacion=? WHERE idUni = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombreUni'],$data['ubicacion'], $date));
            Database::disconnect();

        }

        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM universidad where idUni=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

