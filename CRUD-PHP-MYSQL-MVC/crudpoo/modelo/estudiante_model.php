<?php
    
    class estudiante_model{
        private $DB;
        private $estudiantes;

        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT id,cedula,nombre,apellidos,promedio,edad,fecha,nombreUni,nombreCarrera FROM estudiante INNER JOIN carrera on Fk_Carrera = idCarrera INNER JOIN universidad on Fk_Universidad = idUni ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $this->estudiantes=$fila;
            return $this->estudiantes;
        }

        function create($data){
            //Creamos una sentencia en la cual vamos a insertar los datos que tenemos en nuestro array de $data

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO estudiante(cedula,nombre,apellidos,promedio,edad,fecha,Fk_Carrera,Fk_Universidad)VALUES (?,?,?,?,?,?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'],$data['universidad'],$data['carrera']));
            Database::disconnect();       

        }
        function get_id($id){
            //Si queremos tomar los datos de un id en especifico entonces solamente mandamos a llamar 
            //a esta funcion ubicada en el modelo de carrera.
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM estudiante where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        function update($data,$date){
            //Creamos una nueva sentencia en la cual haremos un update en base a la variable $date la cual
            //cuenta con la ID original de el campo que queremos modificar.
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE estudiante  set  cedula=?, nombre =?, apellidos=?,promedio=?, edad=?, fecha=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'], $date));
            Database::disconnect();

        }

        function delete($date){
            //Creamos una sentencia Delete de carrera utilizando la id ubicada en $date
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM estudiante where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

