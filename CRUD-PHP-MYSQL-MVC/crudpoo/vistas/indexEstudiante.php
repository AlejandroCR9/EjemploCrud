<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:index.php?m=login");
    }
?>


<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>ESTUDIANTES</h2>
        
    </div>
    <div class="container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Promedio</th>
                    <th>Edad</th>
                    <th>Fecha</th>
                    <th>Universidad</th>
                    <th>Carrera</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['id']; ?></th>
                        <th><?php echo $data['cedula']; ?></th>
                        <th><?php echo $data['nombre']; ?></th>
                        <th><?php echo $data['apellidos']; ?></th>
                        <th><?php echo $data['promedio']; ?></th>
                        <th><?php echo $data['edad']; ?></th>
                        <th><?php echo $data['fecha']; ?></th>
                        <th><?php echo $data['nombreUni']; ?></th>
                        <th><?php echo $data['nombreCarrera']; ?></th>
                        <th>
                            <a href="index.php?m=estudiante&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDeleteE&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>