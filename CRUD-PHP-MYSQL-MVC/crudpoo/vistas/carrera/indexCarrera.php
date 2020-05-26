<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:index.php?m=login");
    }
?>

<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>CARRERAS</h2>
        
    </div>
    <div class="container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Capacidad</th>
                    <th>Universidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['idCarrera']; ?></th>
                        <th><?php echo $data['nombreCarrera']; ?></th>
                        <th><?php echo $data['capacidad']; ?></th>
                        <th><?php echo $data['uniFK']; ?></th>
                        <th>
                            <a href="index.php?m=carrera&id=<?php echo $data['idCarrera']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDeleteC&id=<?php echo $data['idCarrera']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>