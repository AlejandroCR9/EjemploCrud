<div class="container">
    <div class="jumbotron">
        <h2>Formulario registro</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id']==""){ ?>
            <form action="index.php?m=get_datosE" method="post">
            <?php } ?>
            <?php if($data['id']!=""){ ?>
            <form action="index.php?m=get_datosE&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>

                <!-- <div class="form-group">
                   <label class=" col-sm-2 control-label" for="txt_id">ID:</label>
                    <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_id" value="<?php echo $data['id']; ?>">
                    </div>
                    
                </div>-->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_cedula">CEDULA:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_cedula" value="<?php echo $data['cedula']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_apellidos">APELLIDOS:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_apellidos" value="<?php echo $data['apellidos']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_promedio">PROMEDIO:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_promedio" value="<?php echo $data['promedio']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_edad">EDAD:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_edad" value="<?php echo $data['edad']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_fecha">FECHA:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="txt_fecha" value="<?php echo $data['fecha']; ?>">
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_fecha">UNIVERSIDAD:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="txt_universidad">
                        <option value="0">Seleccione universidad:</option>
                        <?php
                        
                        $DB;
                        $this->DB=Database::connect();
                        // Realizamos la consulta para extraer los datos
                        $sql= 'SELECT * FROM universidad';
                        $fila=$this->DB->query($sql);

                        foreach($fila as $data):
                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                echo '<option value="'.$data[idUni].'">'.$data[nombreUni].'</option>';
                            
                        endforeach;
                        ?>
                        </select>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_fecha">CARRERA:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="txt_carrera">
                        <option value="0">Seleccione carrera:</option>
                        <?php
                        $DB;
                        $this->DB=Database::connect();
                        // Realizamos la consulta para extraer los datos
                        $sql= 'SELECT * FROM carrera inner JOIN universidad on idUni = uniFK';
                        $fila=$this->DB->query($sql);

                        foreach($fila as $data):
                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                echo '<option value="'.$data[idCarrera].'">'.$data[nombreCarrera].'</option>';
                            
                        endforeach;
                        ?>
                        </select>
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <?php if($data['id']==""){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="registrar">
                    <?php }  ?>
                    <?php if($data['id']!=""){ ?>
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                    <?php }  ?>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>