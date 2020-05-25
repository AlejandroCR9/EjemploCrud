<div class="container">
    <div class="jumbotron">
        <h2>Formulario registro Universidad</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['idUni']==""){ ?>
            <form action="index.php?m=get_datosC" method="post">
            <?php } ?>
            <?php if($data['idUni']!=""){ ?>
            <form action="index.php?m=get_datosC&id=<?php echo $data['idUni'];?>" method="post">
            <?php } ?>

                <!-- <div class="form-group">
                   <label class=" col-sm-2 control-label" for="txt_id">ID:</label>
                    <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_id" value="<?php echo $data['idUni']; ?>">
                    </div>
                    
                </div>-->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombreU">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombreU" value="<?php echo $data['nombreUni']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_ubicacion">UBICACION:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_ubicacion" value="<?php echo $data['ubicacion']; ?>">
                    </div>
                    
                </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <?php if($data['idUni']==""){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="registrar">
                    <?php }  ?>
                    <?php if($data['idUni']!=""){ ?>
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                    <?php }  ?>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>