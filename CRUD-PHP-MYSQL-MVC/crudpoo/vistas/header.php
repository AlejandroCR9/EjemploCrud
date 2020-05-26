<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:index.php?m=login");
    }
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CRUD</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="dropdown">

              <a href="index.php?m=indexE" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar Estudiantes<span class="caret"></span></a>

              </li>
              <li class="dropdown">

              <a href="index.php?m=indexU" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar Universidades<span class="caret"></span></a>

              </li>
              <li class="dropdown">


              <a href="index.php?m=indexC" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar Carrera<span class="caret"></span></a>
              </li>
              <li class="active"><a href="index.php?m=estudiante">Nuevo registro Estudiante</a></li>
              <li class="active"><a href="index.php?m=universidad">Nuevo registro Universidad</a></li>
              <li class="active"><a href="index.php?m=carrera">Nuevo registro Carrera</a></li>
              <li class="active"><a href="index.php?m=salir">Salir</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
</header>