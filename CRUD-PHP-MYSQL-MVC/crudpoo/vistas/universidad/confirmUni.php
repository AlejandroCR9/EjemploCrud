<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:index.php?m=login");
    }
?>
<section class="container">
    <div class="row">
    <form method="post" action="index.php?m=confirmarDeleteU&id=<?php echo "0";?>">
        <div class="col-md-6 col-md-offset-3">
            <label>¿Deseas eliminar este registro?</label>
            <input type="hidden" name="txt_idUni" value="<?php echo $data['idUni']; ?>">
            <input type="submit" name="" value="eliminar" class="form-control btn btn-danger">
        </div>
    </form>
    </div>
</section>