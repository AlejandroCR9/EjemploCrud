<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>Registro de universidad</h2>
        
    </div>
    <div class="container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['idUni']; ?></th>
                        <th><?php echo $data['nombreUni']; ?></th>
                        <th><?php echo $data['ubicacion']; ?></th>
                        <th>
                            <a href="index.php?m=universidad&id=<?php echo $data['idUni']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDelete&id=<?php echo $data['idUni']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>