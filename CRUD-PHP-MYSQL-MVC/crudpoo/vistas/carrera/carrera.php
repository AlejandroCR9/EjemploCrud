<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:index.php?m=login");
    }
?>
<div class="container">
    <div class="jumbotron">
        <h2>Formulario registro Carrera</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['idCarrera']==""){ ?>
            <form action="index.php?m=get_datosA" method="post">
            <?php } ?>
            <?php if($data['idCarrera']!=""){ ?>
            <form action="index.php?m=get_datosA&id=<?php echo $data['idCarrera'];?>" method="post">
            <?php } ?>

                <!-- <div class="form-group">
                   <label class=" col-sm-2 control-label" for="txt_id">ID:</label>
                    <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_id" value="<?php echo $data['idCarrera']; ?>">
                    </div>
                    
                </div>-->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombreC">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombreC" value="<?php echo $data['nombreCarrera']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_capacidad">CAPACIDAD:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_capacidad" value="<?php echo $data['capacidad']; ?>">
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_uni">UNIVERSIDAD:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="txt_univ">
                        <option value="0">Seleccione universidad:</option>
                        <?php
                        $DB;
                        $this->DB=Database::connect();
                        // Realizamos la consulta para extraer los datos
                        $sql= 'SELECT * FROM universidad';
                        $fila=$this->DB->query($sql);

                        foreach($fila as $datax):
                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                echo '<option value="'.$datax[idUni].'">'.$datax[nombreUni].'</option>';
                            
                        endforeach;
                        ?>
                        </select>
                    </div>
                    
                </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <?php if($data['idCarrera']==""){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="registrar">
                    <?php }  ?>
                    <?php if($data['idCarrera']!=""){ ?>
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                    <?php }  ?>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>