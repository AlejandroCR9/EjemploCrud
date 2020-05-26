<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("Location:index.php?m=indexE");
    }
?>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
<div class="container">
    <div class="jumbotron">
        <center><h2 >LOGIN</h2></center>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <form action="index.php?m=ingreso" method="post">
                <!-- <div class="form-group">
                   <label class=" col-sm-2 control-label" for="txt_id">ID:</label>
                    <div class="col-sm-10">
                
                    </div>
                    
                </div>-->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_usuario">Usuario:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_usuario" value="">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_contra">Contraseña:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="txt_contra" value="">
                    </div>
                    
                </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                
                        <input type="submit" class="btn btn-primary form-control" name="" value="Ingresar">
                
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>